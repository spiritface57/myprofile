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


class ContactFormController extends Component
{
    public function sendMail(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|phone:CA',
            'subject1' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ], [
            'name.required' => "Please specify your Name for future reference.",
            'email.required' => "Please specify your Email for future reference.",
            'email.email' => "Please specify your Email for future reference.",
            'phone.required' => "Please specify your Phone for future reference.",
            'phone.phone' => "Format of Phone not Correct.",
            'subject1.required' => "Please specify your Subject for future reference.",
            'message.required' => "Please specify your Message for future reference."
        ]);

        if ($validator->fails()) {
            return redirect('/#contact')->withErrors($validator->errors());
        } else {
            try{
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormMail($request->name,$request->email,$request->phone,$request->subject1,$request->message));
            Mail::to($request->email)->send(new ResponseContactForm($request->name));
            
            return redirect('/#contact')
                ->with(
                    'success',
                    "Thank you for getting in touch! Your message has been received and I appreciate you reaching out. I'll make sure to get back to you as soon as I can. Have a great day!"
                );
            }catch(Exception $e){
                Log::info($e->getMessage());
                return redirect('/#contact')->withErrors('Please Submit Form again.Somthing went Wrong.'); 
            }    
        }
    }
    public function render()
    {
        return view('livewire.contact-form-controller');
    }
}
