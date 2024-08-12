<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\Orders;

class InvoiceOrderMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $totalPrice;
    /**
     * Create a new message instance.
     */
    public function __construct(Orders $order, $totalPrice)
    {
        $this->order = $order;
        $this->totalPrice = $totalPrice; // Asigna el precio total a la variable $totalPrice
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('rimpsa2024@gmail.com', 'Adrian Delgado'),
            replyTo: [
                new Address('hectoradolfoolivares@gmail.com', 'Taylor Swift'),
            ],
            subject: 'Facturación de su pedido',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice',
            with: ['order' => $this->order, 'totalPrice' => $this->totalPrice],
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
