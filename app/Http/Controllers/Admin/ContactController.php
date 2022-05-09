<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{

    public function store(Request $request){
        $contact_form_data = $request->all();

        Mail::to('mdtohin8585@gmail.com')->send(new ContactMail($contact_form_data));

        $notification = [
            'alert-type' => 'success',
            'message' => 'Your Message has been submitted Successfully !',
        ];

        return redirect()->back()->with($notification);
    }
}