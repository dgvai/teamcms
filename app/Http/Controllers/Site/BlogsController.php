<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blogs\Blogs;
use App\Models\SEO\SeoBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    public function showBlogs()
    {
        $blogs = Blogs::where('active',1)->orderBy('created_at','desc')->paginate(9);
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

    public function showUnapprovedBlog($id)
    {
        $blog = Blogs::find($id);
        return view('frontend.single-blog',['blog'=> $blog]);
    }

    public function editBlog($slug)
    {
        $blog = Blogs::where('slug',$slug)->first();
        if($blog->author->roll_id == auth()->user()->roll_id)
        {
            return view('frontend.edit-blog',['blog' => $blog]);
        } 
        else
        {
            abort(403, 'Unauthorized action.');
        }
        
    }

    public function getBody(Request $request)
    {
        $blog = Blogs::find($request->id);
        return response()->json($blog);
    }

    public function updateBlogPost(Request $request)
    {
        $blog = Blogs::find($request->bid);
        if($blog->author->roll_id == auth()->user()->roll_id)
        {
            $blog->title = $request->title;
            $slug = slugify($request->title).'-'.date('hisdmy');
            $blog->slug = $slug;
            if($request->hasFile('image'))
            {
                $filename = 'TCMS-blog-'.$slug.'-'.rand(1000,9999).'-DG-'.rand(1000,9999).'.'.$request->image->extension();
                $request->image->storeAs('blogs',$filename,'public');
                unlink(storage_path('app/public/blogs').'/'.$blog->banner);
                $blog->banner = $filename;
            }
            $blog->post = $request->blog_post;
            $blog->save();
            return redirect()->route('blog.show',['slug'=>$blog->slug])->with('success',__('You have successfully edited the Blog!'));
        }
        else
        {
            return redirect()->back()->with('success',__('Dont be tricky, your boss is here!'));
        }
        
    }

    public function deleteBlog($slug)
    {
        //not used still
        $blog = Blogs::find($request->id);
        $blog->delete();
        return response()->json(['success' => true]);
    }

    public function newBlogPost(Request $request)
    {
        if($request->blog_post != null)
        {
            $blog = new Blogs();
            $blog->title = $request->title;
            $slug = slugify($request->title).'-'.date('hisdmy');
            $blog->slug = $slug;
            $blog->user_id = Auth::id();
            if($request->hasFile('image'))
            {
                $filename = 'TCMS-blog-'.$slug.'-'.rand(1000,9999).'-DG-'.rand(1000,9999).'.'.$request->image->extension();
                $request->image->storeAs('blogs',$filename,'public');
                $blog->banner = $filename;
            }
            $blog->post = $request->blog_post;
            if($blog->save())
            {
                $seo = new SeoBlog();
                $seo->title = $blog->title;
                $seo->blog_id = $blog->id;
                $seo->text = htmlentities(mb_substr(strip_tags($blog->post),0,154)).'...';
                $seo->save();
            }
            return redirect()->route('blog.show',['slug'=>$blog->slug])->with('success',__('You have successfully posted the Blog! Please be patient untill this is approved!'));
        }
        else 
        {
            return redirect()->back()->with('toast_error',__('Please write a blog post before you submit!'));
        }
    }
}
