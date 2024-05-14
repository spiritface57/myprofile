<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactFormMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResponseContactForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;


class ContactFormController extends Component
{
    #[Validate('required|recaptchav3:register,0.5')]
    public ?string $captchaToken = null;
    #[Validate('required')]
    public ?string $name = null;
    #[Validate('required|email')]
    public ?string $email = null;
    #[Validate('required|phone:CA')]
    public ?string $phone = null;
    #[Validate('required')]
    public ?string $subject1 = null;
    #[Validate('required')]
    public ?string $message1 = null;
    public function sendMail()
    {
            try {
                Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormMail($this->name, $this->email, $this->phone, $this->subject1, $this->message1));
                Mail::to($this->email)->send(new ResponseContactForm($this->name));
                return redirect('/#contact')
                    ->with(
                        'success',
                        "Thank you for getting in touch! Your message has been received and I appreciate you reaching out. I'll make sure to get back to you as soon as I can. Have a great day!"
                    );
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return redirect('/#contact')->with('error','Please Submit Form again.Somthing went Wrong.');
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
