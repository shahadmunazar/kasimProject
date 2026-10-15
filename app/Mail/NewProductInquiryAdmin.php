<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ProductInquiry;

class NewProductInquiryAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;

    public function __construct(ProductInquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function envelope(): Envelope
    {
        $productName = $this->inquiry->product ? $this->inquiry->product->name : 'Product Inquiry';
        return new Envelope(
            subject: 'New Order/Product Enquiry: ' . $productName . ' - ' . $this->inquiry->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.inquiries.received_admin',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
