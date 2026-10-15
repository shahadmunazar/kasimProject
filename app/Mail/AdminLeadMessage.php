<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminLeadMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        $data = is_array($this->contact) ? $this->contact : $this->contact->toArray();

        return $this->view('emails.admin_lead')
            ->with([
                'name' => $data['name'] ?? '',
                'email' => $data['email'] ?? '',
                'mobile' => $data['mobile'] ?? '',
                'service_type' => $data['service_type'] ?? '',
                'address' => $data['address'] ?? '',
                'subject' => $data['subject'] ?? '',
                'message' => $data['message'] ?? '',
            ])
            ->subject('New Website Contact Lead: ' . ($data['name'] ?? 'Inquiry'));
    }
}
