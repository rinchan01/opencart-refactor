<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'OpenCart Account Password Reset',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'resetPasswordMail',
        );
    }
}
