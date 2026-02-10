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
        // Honeypot check: the hidden field must be empty
        $honeypotName = session('honeypot_field');
        if ($honeypotName && !empty($request->input($honeypotName))) {
            return back()->with('error', 'Une erreur est survenue.');
        }

        // Time-based check: reject submissions faster than 3 seconds
        $formTime = (int) $request->input('form_time');
        if ($formTime && (now()->timestamp - $formTime) < 3) {
            return back()->with('error', 'Une erreur est survenue.');
        }

        // Anti-robot math challenge
        $expectedAnswer = session('antirobot_answer');
        $givenAnswer = (int) $request->input('antirobot');
        if (!$expectedAnswer || $givenAnswer !== $expectedAnswer) {
            return back()
                ->withInput()
                ->withErrors(['antirobot' => 'La réponse à la question de sécurité est incorrecte.']);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:5000',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        // Clear session tokens
        session()->forget(['honeypot_field', 'antirobot_answer']);

        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
