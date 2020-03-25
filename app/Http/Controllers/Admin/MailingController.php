<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mailings\Contact;
use Illuminate\Http\Request;

class MailingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod']);
    }

    public function contact()
    {
        $new = Contact::new()->get();
        $all = Contact::all();
        return view('admin.pages.contacts',['new' => $new, 'all' => $all]);
    }

    public function readContact(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->seen = true;
        if($contact->save())
        {
            return response()->json(['success' => true]);
        }
    }

    public function replyContact(Request $request)
    {
        $email = Contact::find($request->id)->email;
        // config
    }
}
