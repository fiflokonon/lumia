<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionValidation extends Mailable
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
            subject: "Validation d'inscription à une formation chez Lumia Consulting",
        );
    }


    public function build()
    {
        return $this->view('mails.inscription_validation');
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
