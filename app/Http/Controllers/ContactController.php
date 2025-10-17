<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ]);

        // Enregistrement du message dans la base de données
        Contact::create($validated);

        return redirect()->route('contact.show')->with('success', 'Votre message a été envoyé avec succès!');
    }

    // Admin - Liste des messages
    public function adminIndex()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    // Admin - Voir un message
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    // Admin - Supprimer un message
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Message supprimé avec succès!');
    }
}
