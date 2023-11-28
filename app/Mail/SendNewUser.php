<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewUser extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New user registration',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view(
            view : 'mail.sendNewUser',
            data : [
                'user'=>$this->user,
            ]
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
