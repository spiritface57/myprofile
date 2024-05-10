<?php

use App\Http\Controllers\Forground\ContactForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false,'reset'=>false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact-me',[ContactForm::class,'index'])->name('contact.me.index');
Route::post('contact-me', [ContactForm::class, 'sendMail'])->name('contact.me.store');
