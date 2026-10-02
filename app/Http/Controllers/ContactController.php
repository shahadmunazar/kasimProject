<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\AdminLeadMessage;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the contact form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'service_type' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Save the contact message to the database
        $contact = Contact::create($validated);

        // Send email to the user (confirmation)
        // Mail::to($contact->email)->send(new ContactFormSubmitted($contact));

        // // Send email to the admin (lead message)
        // Mail::to('tcsmarttechnology@gmail.com')->send(new AdminLeadMessage($contact));

        // Return a JSON response to the frontend
        return response()->json([
            'message' => 'Thank you! Your message has been successfully sent.',
        ]);
    }
}