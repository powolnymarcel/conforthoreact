<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Retrieve the dynamic honeypot field name from the session or request
        $honeypotName = $request->honeypotName; // Pass this dynamically if needed

        // Check if the honeypot field is filled
        if (!empty($request->$honeypotName)) {
            return back()->with('error', 'Spam detected!');
        }
        // Check submission time (e.g., less than 5 seconds is likely spam)
        $formTime = $request->form_time;
        $currentTime = now()->timestamp;

        if (($currentTime - $formTime) < 5) {
            return back()->with('error', 'Spam detected!');
        }



        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
