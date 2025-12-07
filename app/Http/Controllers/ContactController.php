<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // In a real application, you would send the email or save to database here
        // For this demo, we'll just simulate a successful submission

        return redirect()->back()
            ->with('success', 'Thank you for your message! We will get back to you soon.');

        // Example of how you might send an email in a real implementation:
        /*
        Mail::send('emails.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ], function($mail) use ($request) {
            $mail->to('admin@abctyping.com', 'ABC Typing Support')
                ->subject("New Contact Form Submission: {$request->subject}")
                ->replyTo($request->email, $request->name);
        });
        */
    }
}