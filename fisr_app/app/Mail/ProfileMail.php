<?php

namespace App\Mail;

use App\Models\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProfileMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */


    public function __construct(private Profile $profile)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Profile Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */

    public function content(): Content
    {
        $date = $this->profile->created_at;
        $id = $this->profile->id;

        $href = url('') . '/verify_email/' . base64_encode($date . '///' . $id);
        return new Content(
            view: 'emails.inscription',
            with: [
                'email' => $this->profile->email,
                'name' => $this->profile->name,
                'href' => $href
            ],
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
