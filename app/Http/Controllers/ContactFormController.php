<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function form()
    {
        return view('layouts.postulacion');
        //return view('contact.form');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::to('jci.wendy.22@gmail.com')->send(new ContactForm($data));

        return back()->with('data', $data)->with('success', 'Mensaje enviado correctamente');
    }
}
