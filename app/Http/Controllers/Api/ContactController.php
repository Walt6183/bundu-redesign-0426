<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    /**
     * Handle contact form submission
     */
    public function send(Request $request)
    {
        // Rate limiting: max 5 per minute per IP
        $key = 'contact-form:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'error' => 'Zu viele Anfragen. Bitte versuche es in ' . $seconds . ' Sekunden erneut.',
            ], 429);
        }
        RateLimiter::hit($key, 60);

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'service' => 'nullable|string|max:255',
        ]);

        try {
            $recipient = config('mail.from.address', 'info@bundu.ch');

            Mail::to($recipient)->send(new ContactFormMail($validated));

            return response()->json([
                'success' => true,
                'message' => 'Nachricht wurde erfolgreich gesendet.',
            ]);
        } catch (\Exception $e) {
            report($e);

            return response()->json([
                'error' => 'Nachricht konnte nicht gesendet werden. Bitte versuche es später erneut.',
            ], 500);
        }
    }
}
