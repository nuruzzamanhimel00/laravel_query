<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOTPMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'SEND OTP TO User Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // dd($this->data);
        return new Content(
            view: 'mail.send-otp',
            //  with: [
            //     'name' => $this->data['name'],
            //     'email' => $this->data['email'],
            //     'password' => $this->data['password'],
            // ],
        );
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
