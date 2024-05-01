<?php

namespace App\Mail;

use App\Models\order_invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOrderAskPrice extends Mailable
{
    use Queueable, SerializesModels;
    public $orderInvoice;
    /**
     * Create a new message instance.
     */
    public function __construct($order_ref)
    {
       $this->orderInvoice = order_invoice::query()->where('order_ref',$order_ref)->first();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Offer Price - For Engineer',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.SendOrderAskPrice',
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
