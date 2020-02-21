<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blogs\Blogs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blogs::all()->take(3);
        return view('frontend.home',[
            'blogs' => $blogs
        ]);
    }
}
