<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NovoCurriculoRecebido extends Mailable
{
    use Queueable, SerializesModels;

    private $resumes;
    private $job;
    private $sector;
    /**
     * Create a new message instance.
     */
    public function __construct($resumes, $job, $sector)
    {
        $this->resumes = $resumes;
        $this->job = $job;
        $this->sector = $sector;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Novo Currículo Recebido',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.novo-curriculo-recebido',
            with: [
                'resumes' => $this->resumes,
                'job' => $this->job,
                'sector' => $this->sector
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
