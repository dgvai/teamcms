<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\EmailQueuer;
use App\Mail\GeneralQueryReply;
use App\Mail\NewsLetter;
use App\Models\Entities\SiteBasics;
use App\Models\Mailings\Contact;
use App\Models\Team\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class MailingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod']);
    }

    public function run()
    {
        Artisan::call('queue:work');
        return true;
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
        $data = [
            'subject' => $request->subject,
            'body'    => $request->message,
            'app_name' => SiteBasics::first()->name,
        ];
        Mail::to($email)->send(new GeneralQueryReply($data));
        return redirect()->back()->with('toast_success','Message has been sent!');
    }

    public function notify(Request $request)
    {
        $all = User::global()->get();
        return view('admin.pages.notify',['members' => $all]);
    }

    public function mailSpecific(Request $request)
    {
        switch($request->target)
        {
            case 1 : $recepients = User::current()->get()->pluck('email'); break;
            case 2 : $recepients = User::committee()->get()->pluck('email'); break;
            case 3 : $recepients = User::alumnis()->get()->pluck('email'); break;
            case 4 : $recepients = User::members()->get()->pluck('email'); break;
            case 5 : $recepients = $request->custom; break;
        }
        $data = [
            'subject'   => $request->subject,
            'body'      => $request->body,
        ];

        EmailQueuer::dispatch($recepients,$data);
        
        return redirect()->back()->with('success','Mail has been queued for sending...');
    }

    public function mailAll(Request $request)
    {
        $recepients = User::global()->get()->pluck('email');

        $data = [
            'subject'   => $request->subject,
            'body'      => $request->body,
        ];

        EmailQueuer::dispatch($recepients,$data);
        
        return redirect()->back()->with('success','Mail has been queued for sending...');
    }
}
