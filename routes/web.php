<?php

use App\Http\Controllers\Forground\ContactForm;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\ContactFormController;

Route::get('/', ContactFormController::class)->name('homepage');

Auth::routes(['register'=>false,'reset'=>false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/contact-me',[ContactForm::class,'index'])->name('contact.me.index');
// Route::post('contact-me', [ContactForm::class, 'sendMail'])->name('contact.me.store');

// Route::get('/contact-me',[ContactFormController::class,'index'])->name('contact.me.index');
// Route::post('contact-me', [ContactFormController::class, 'sendMail'])->name('contact.me.store');


// Route::get('/contact-form',ContactFormController::class)->name('contact-form');
