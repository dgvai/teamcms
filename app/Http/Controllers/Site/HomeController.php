<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blogs\Blogs;
use App\Models\Events\Events;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blogs::where('active',1)->latest()->get()->take(3);
        $events = Events::latest()->get()->take(3);

        return view('frontend.home',[
            'blogs' => $blogs,
            'events' => $events
        ]);
    }
}
