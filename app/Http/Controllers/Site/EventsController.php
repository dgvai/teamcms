<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function showEvents()
    {
        return view('frontend.events');
    }

    public function showEvent($slug)
    {
        return view('frontend.single-event');
    }
}
