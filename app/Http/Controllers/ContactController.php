<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        $contactData = $request->validated();

        Mail::to(config('mail.owner_address'))->send(new ContactMessageMail($contactData));

        return redirect()->to('/#contact')->with(
            'success',
            'Thanks for reaching out. Your message has been sent.'
        );
    }
}
