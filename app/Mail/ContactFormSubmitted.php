<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->view('emails.user_emails')
            ->with([
                'name' => $this->contact['name'],
                'email' => $this->contact['email'],
                'mobile' => $this->contact['mobile'],
                'service_type' => $this->contact['service_type'],
                'address' => $this->contact['address'],
                'subject' => $this->contact['subject'],
                'message_content' => $this->contact['message'], // ✅ Use a different key name
            ])
            ->subject('Confirmation: Your Contact Form Submission');
    }
}
