<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blogs\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function showBlogs()
    {
        $blogs = Blogs::orderBy('created_at','desc')->paginate(9);
        return view('frontend.blogs',['blogs'=>$blogs]);
    }
    
    public function newBlog()
    {
        return view('frontend.new-blog');
    }

    public function showBlog($slug)
    {
        $blog = Blogs::where('slug',$slug)->first();
        return view('frontend.single-blog',['blog'=> $blog]);
    }

    public function editBlog($slug)
    {
        return view('frontend.edit-blog',['blogPost' => 'true']);
    }

    public function deleteBlog($slug)
    {
        // return view('frontend.edit-blog');
    }

    public function newBlogPost(Request $request)
    {
        if($request->blog_post != null)
        {
            $blog = new Blogs();
            $blog->title = $request->title;
            $slug = Str::slug($request->title).'-'.date('hisdmy');
            $blog->slug = $slug;
            $blog->user_id = Auth::id();
            if($request->hasFile('image'))
            {
                $filename = 'TCMS-blog-'.$slug.'-'.rand(1000,9999).'-DG-'.rand(1000,9999).'.'.$request->image->extension();
                $request->image->storeAs('blogs',$filename,'public');
                $blog->banner = $filename;
            }
            $blog->post = $request->blog_post;
            $blog->save();
            return redirect()->back()->with('success',__('lines.blog.done'));
        }
        else 
        {
            return redirect()->back()->with('toast_error',__('lines.blog.nopost'));
        }
    }
}
