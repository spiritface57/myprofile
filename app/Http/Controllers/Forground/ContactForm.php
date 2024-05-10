<?php

namespace App\Http\Controllers\Forground;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ContactForm extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }
    public function index(): View
    {
        return view('welcome');
    }
    public function sendMail(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|phone:CA',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ], [
            'name.required' => "Please specify your Name for future reference.",
            'email.required' => "Please specify your Email for future reference.",
            'email.email' => "Please specify your Email for future reference.",
            'phone.required' => "Please specify your Phone for future reference.",
            'phone.phone' => "Format of Phone not Correct.",
            'subject.required' => "Please specify your Subject for future reference.",
            'message.required' => "Please specify your Message for future reference."
        ]);

        if ($validator->fails()) {
            return redirect('/#contact', 302)->withErrors($validator->errors());
        } else {
            return redirect('/#contact', 302)
                    ->with(
                          'success',
                          "Thank you for getting in touch! Your message has been received and I appreciate you reaching out. I'll make sure to get back to you as soon as I can. Have a great day!"
                        );
        }
    }
}
