<?php

namespace Src\Shared\Laravel\Mailer\Domain;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Src\Shared\Utils\Strings\StringsUtil;
use Illuminate\Contracts\Queue\ShouldQueue;

abstract class CustomBaseEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    const EMAIL_BASE = 'email.base';

    protected string $vista;
    public string $destinatario;
    public string $motivo;


    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(StringsUtil::minusculas(config('mail.from.address'))),
            subject: $this->motivo,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->vista ?? self::EMAIL_BASE,
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
