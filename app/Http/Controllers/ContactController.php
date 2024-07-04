<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // app/Http/Controllers/ContactController.php

public function create()
{
    return view('contacts.create');
}

public function edit($id)
{
    $contact = Contact::findOrFail($id); 
    return view('contacts.edit', compact('contact'));
}

    public function showContactForm()
    {
        return view('contact');
    }

    public function submitContactForm(Request $request)
    {
        // Lakukan validasi jika diperlukan
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Simpan pesan atau lakukan tindakan lainnya

        return redirect('/')->with('success', 'Your message has been sent successfully!');
    }
}