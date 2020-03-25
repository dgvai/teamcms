<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Mailings\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        if(is_null(auth()->user()))
        {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return redirect()->back()->with('success',__('Thanks for your interest, we will respond you soon through yoour mail!'));
        }
        else 
        {
            return redirect()->back()->with('warning',__('Contact is only available for non-members'));
        }  
    }
}
