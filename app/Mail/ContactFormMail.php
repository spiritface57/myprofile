<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$phone,$email,$subject1,$message;
    /**
     * Create a new message instance.
     */
    public function __construct($name,$email,$phone,$subject1,$message)
    {
        $this->name=$name;
        $this->email=$email;
        $this->phone=$phone;
        $this->subject1=$subject1;
        $this->message=$message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $content = new Content(
            view: 'Emails.contact-me',
            with: [
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'subject1' => $this->subject1,
                'message1' => $this->message,
            ]
        );
        return $content;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
