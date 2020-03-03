<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs\Blogs;
use App\Models\SEO\SeoBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod']);
    }
    
    public function manage()
    {
        $blogs = Blogs::all();
        $new = Blogs::new()->get();
        return view('admin.pages.manage-blogs',['blogs' => $blogs, 'new' => $new]);
    }

    public function viewSigned(Request $request)
    {
        return URL::temporarySignedRoute('blog.show.unapproved', now()->addMinutes(10), ['id' => $request->id]);
    }

    public function approve(Request $request)
    {
        $blog = Blogs::find($request->id);
        $blog->active = 1;
        $blog->save();
        return response()->json(['success' => true]);
    }

    public function reject(Request $request)
    {
        $blog = Blogs::find($request->id);
        $blog->delete();
        return response()->json(['success' => true]);
    }

    public function delete(Request $request)
    {
        $blog = Blogs::find($request->id);
        $blog->delete();
        return response()->json(['success' => true]);
    }

    public function getSeo(Request $request)
    {
        $blog = Blogs::find($request->id)->seo;
        return response()->json($blog);
    }

    public function updateSeo(Request $request)
    {
        $seo = SeoBlog::find($request->id);
        $seo->title = $request->title;
        $seo->text = $request->text;
        $seo->save();
        return redirect()->back()->with('success','SEO has been updated!');
    }
}
