<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __invoke(ContactRequest $request): RedirectResponse
    {
        $request->validated();

        $contact = new Contact;

        $contact->user_id = Auth::user()->id ?? null;
        $contact->email = $request->email;
        $contact->body = $request->body;
        $contact->save();

        return redirect('/articles')->with('succesForm', 'Dziekuję za dołączenie pomysłu, wiadmość zwrotna została wysłana na maila');
    }
}
