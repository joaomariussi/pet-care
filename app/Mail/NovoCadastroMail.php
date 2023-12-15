<?php

namespace App\Mail;

use App\Models\admin\Sectors;
use App\Models\site\Contacts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NovoCadastroMail extends Mailable
{
    use Queueable, SerializesModels;

    private $contacts;
    public $sector;

    /**
     * Create a new message instance.
     */
    public function __construct($contacts, $sector)
    {
        $this->contacts = $contacts;
        $this->sector = $sector;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Novo formulário de contato',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.novo-cadastro-contato',
            with: [
                'contacts' => $this->contacts,
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
