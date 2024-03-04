<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $formation;
    public $enrolment;
    /**
     * Create a new message instance.
     */
    public function __construct($formation, $enrolment)
    {
        $this->formation = $formation;
        $this->enrolment = $enrolment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de candidature de formation chez Lumia Consulting ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('mails.inscription_confirmation');
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
