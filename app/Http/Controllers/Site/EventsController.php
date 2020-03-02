<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Events\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function showEvents()
    {
        $events = Events::orderBy('created_at','desc')->paginate(5);
        return view('frontend.events',['events' => $events]);
    }

    public function showEvent($slug)
    {
        $event = Events::where('slug',$slug)->first();
        return view('frontend.single-event',['event' => $event]);
    }
}
