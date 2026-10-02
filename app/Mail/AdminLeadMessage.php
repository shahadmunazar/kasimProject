<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminLeadMessage extends Mailable
{
    use SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->view('emails.admin_lead')
    ->with([
        'name' => $this->data['name'],
        'email' => $this->data['email'],
        'mobile' => $this->data['mobile'],
        'service_type' => $this->data['service_type'],
        'address' => $this->data['address'],
        'subject' => $this->data['subject'],
        'message_content' => $this->data['message'], // ✅ Use different key name
    ])
    ->subject('New Contact Lead');

    }
}
