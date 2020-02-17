<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function showBlogs()
    {
        return view('frontend.blogs');
    }
    
    public function newBlog()
    {
        return view('frontend.new-blog');
    }

    public function showBlog($slug)
    {
        return view('frontend.single-blog');
    }

    public function editBlog($slug)
    {
        return view('frontend.edit-blog',['blogPost' => 'true']);
    }

    public function deleteBlog($slug)
    {
        // return view('frontend.edit-blog');
    }
}
