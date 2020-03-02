<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Events\Events;
use App\Models\Events\PostEventPost;
use App\Models\SEO\SeoEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod']);
    }
    
    public function create()
    {
        return view('admin.pages.create-event');
    }
    public function createEvent(Request $request)
    {
        $event = new Events();
        $slug = Str::slug($request->title,'-').'-'.date('hisdmy');
        $event->title = $request->title;
        $event->slug = $slug;
        if($request->hasFile('poster'))
        {
            $filename = 'TCMS-Events-Poster-'.$slug.'-'.rand(1000,9999).'-DG-'.rand(1000,9999).'.'.$request->poster->extension();
            $event->poster = $filename;
            $request->poster->storeAs('events',$filename,'public');
        }

        if($request->has('multi'))
        {
            $event->multi = 1;
            $event->multi_start_time = $request->date_start;
            $event->multi_end_time = $request->date_end;
        }
        else
        {
            $event->single_time = $request->date_single;
        }
        
        $event->place = $request->place;
        $event->links = $request->links;
        $event->post = $request->text;
        if($event->save())
        {
            $seo = new SeoEvent();
            $seo->title = $event->title;
            $seo->event_id = $event->id;
            $seo->text = htmlentities(mb_substr(strip_tags($event->post),0,154)).'...';
            $seo->save();
            return redirect()->route('admin.events.manage')->with('success','Event Successfully Created!');
        }
        else
        {
            return redirect()->route('admin.events.manage')->with('toast_error','Something went wrong!');
        }
        
    }

    public function getEvent(Request $request)
    {
        $event  = Events::find($request->eid);
        return response()->json($event);
    }

    public function deleteEvent(Request $request)
    {
        $event  = Events::find($request->eid);
        $event->delete();
        return response()->json(['success' => true]);
    }

    public function manage()
    {
        $events = Events::all();
        $upcoming = Events::whereDate('single_time','>=',Carbon::today())->orWhereDate('multi_start_time','>=',Carbon::today())->get();
        return view('admin.pages.manage-event',['events' => $events, 'upcomings' => $upcoming]);
    }

    public function editEventInfo(Request $request)
    {
        $event = Events::find($request->evid);
        $slug = Str::slug($request->title,'-');
        $event->title = $request->title;
        $event->slug = $slug;
        $event->place = $request->place;
        if($request->hasFile('poster'))
        {
            $oldfile = $event->poster;
            unlink(storage_path('app/public/events').'/'.$oldfile);
            $filename = 'TCMS-Events-Poster-'.$slug.'-'.rand(1000,9999).'-DG-'.rand(1000,9999).'.'.$request->poster->extension();
            $event->poster = $filename;
            $request->poster->storeAs('events',$filename,'public');
        }

        if($request->has('multi'))
        {
            $event->multi = 1;
            $event->multi_start_time = $request->date_start;
            $event->multi_end_time = $request->date_end;
        }
        else
        {
            $event->multi = 0;
            $event->single_time = $request->date_single;
        }

        $event->save();

        return redirect()->back()->with('success','Event Successfully Updated!');
    }

    public function addEventlink(Request $request)
    {
        $event = Events::find($request->evid);
        $links = json_decode($event->links,true);
        array_push($links, ['name' => $request->name, 'url' => $request->url]);
        $event->links = json_encode($links);
        $event->save();
        return redirect()->back()->with('toast_success','Link was added!');
    }

    public function removeEventlink(Request $request)
    {
        $event = Events::find($request->evid);
        $links = json_decode($event->links,true);
        unset($links[$request->index]);
        $event->links = json_encode($links);
        $event->save();
        return response()->json(['success'=>true]);
    }

    public function editEventdetails(Request $request)
    {
        $event = Events::find($request->evid);
        $event->post = $request->text;
        $event->save();
        return redirect()->back()->with('toast_success','Updated!');
    }

    public function getPostEvent(Request $request)
    {
        $PE = PostEventPost::where('event_id',$request->evid)->first();
        return response()->json($PE);
    }

    public function addPostEvent(Request $request)
    {
        $PE = new PostEventPost();
        $PE->event_id = $request->evid;
        $PE->post = $request->text;
        if($request->hasFile('images'))
        {
            $imagesArray = [];
            foreach($request->images as $image)
            {
                $filename = 'TCMS-PE-'.rand(1000,9999).'-DG-'.rand(10000,99999).'.'.$image->extension();
                $image->storeAs('events/post',$filename,'public');
                array_push($imagesArray,$filename);
            }
            $PE->images = json_encode($imagesArray);
        }

        $PE->save();

        return redirect()->back()->with('toast_success','The post-event post has been added!');
    }

    public function editPostEvent(Request $request)
    {
        $PE = PostEventPost::where('event_id',$request->evid)->first();
        $PE->post = $request->text;
        if($request->hasFile('images'))
        {
            $imagesArray = json_decode($PE->images,true);
            foreach($request->images as $image)
            {
                $filename = 'TCMS-PE-'.rand(1000,9999).'-DG-'.rand(10000,99999).'.'.$image->extension();
                $image->storeAs('events/post',$filename,'public');
                array_push($imagesArray,$filename);
            }
            $PE->images = json_encode($imagesArray);
        }

        $PE->save();

        return redirect()->back()->with('toast_success','The post-event post has been edited!');
    }

    public function delImgPostEvent(Request $request)
    {
        $PE = PostEventPost::where('event_id',$request->evid)->first();
        $images = json_decode($PE->images,true);
        unlink(storage_path('app/public/events/post').'/'.$images[$request->index]);
        unset($images[$request->index]);
        $PE->images = json_encode($images);
        $PE->save();
        return response()->json(['success'=>true]);
    }
}
