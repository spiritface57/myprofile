<?php

namespace App\Livewire;

use Livewire\Component;

use App\Mail\ContactFormMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResponseContactForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;


class ContactFormController extends Component
{
    public string $captchaToken = '';

    #[Validate('required',message:'Please specify your name for future reference.')]
    public string $name = '';

    #[Validate('required',message:'Please Enter your email for future reference.')]
    #[Validate('email',message:'Please Enter your email for future reference.')]
    public string $email = '';

    #[Validate('required',message:'Please Enter the Correct Format of your phone for future reference.')]
    #[Validate('phone:CA',message:'Please Enter the Correct Format of your phone for future reference.')]
    public string $phone = '';

    #[Validate('required',message:'Please Enter your subject for future reference.')]
    public string $subject1 = '';

    #[Validate('required',message:'Please Enter your message for future reference.')]
    #[Validate('min:20',message:'Message more than 20 character is acceptable.')]
    public string $message1 = '';

    // public function rules()
    // {
    //     [
    //         'captchaToken' => [
    //             'required|recaptchav3:register,0.5',
    //         ]
    //     ];
    // }

    public function sendMail()
    {
       $this->validate();
        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormMail($this->name, $this->email, $this->phone, $this->subject1, $this->message1));
            Mail::to($this->email)->send(new ResponseContactForm($this->name));
            return back()
                ->with(
                    'success',
                    "Thank you for getting in touch! Your message has been received and I appreciate you reaching out. I'll make sure to get back to you as soon as I can. Have a great day!"
                );
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return back()->with('error', 'Please Submit Form again.Somthing went Wrong.');
        }
    }

    public function submit(): void
    {
        //Other field validations
        $query = http_build_query([
            'secret' => config('services.google_captcha.secret_key'),
            'response' => $this->captchaToken,
        ]);
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?' . $query);
        $captchaLevel = $response->json('score');
        throw_if($captchaLevel <= 0.5, ValidationException::withMessages([
            'error' => __('Error on captcha verification. Please, refresh the page and try again.')
        ]));
        //You logic if captcha passes
        $this->sendMail();
    }
    public function render()
    {
        return view('livewire.contact-form-controller')->layout('layouts.contact');
    }
}
