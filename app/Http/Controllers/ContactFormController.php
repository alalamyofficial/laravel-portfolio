<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        // $contact_form_data = request()->all();
        $contact_form_data = array(
            'name'      =>  $request->name,
            'email'      =>  $request->email,
            'phone'      =>  $request->phone,
            'message'   =>   $request->message
        );

        Mail::to('theories619@gmail.com')->send(new ContactFormMail($contact_form_data));
        
        return redirect()->route('home','/#contact')->with('success','Your message has been submitted successfully');
    }
}
