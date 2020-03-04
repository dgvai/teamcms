<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entities\SiteBasics;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod']);
    }

    public function manage()
    {
        $site = SiteBasics::first();
        $icons = json_decode(file_get_contents(public_path('datasets/socials.json')));
        return view('admin.pages.profile-manage',[
            'exts' => $site->extra_infos,
            'icons' => $icons,
            'links' => $site->social_links 
        ]);
    }

    public function addExtra(Request $request)
    {
        $site = SiteBasics::first();
        $attributes = (array) $site->extra_infos;
        $new['key'] = Str::slug($request->attr_name,'_');
        $new['name'] = $request->attr_name;
        array_push($attributes,$new);
        $site->ext_infos = json_encode($attributes);
        $site->save();
        return redirect()->back()->with('success_toast','Extra Information was added!');
    }

    public function deleteExtra(Request $request)
    {
        $site = SiteBasics::first();
        $attributes = (array) $site->extra_infos;
        unset($attributes[$request->key]);
        $site->ext_infos = json_encode(array_values($attributes));
        $site->save();
        return response()->json(['success'=>true]);
    }

    public function addlink(Request $request)
    {
        $site = SiteBasics::first();
        $attributes = (array) $site->social_links;
        $new['name'] = Str::slug($request->icon_name,'_');
        $new['icon'] = $request->icon;
        array_push($attributes,$new);
        $site->ext_socials = json_encode($attributes);
        $site->save();
        return redirect()->back()->with('success_toast','Social link was added!');
    }

    public function deleteLink(Request $request)
    {
        $site = SiteBasics::first();
        $attributes = (array) $site->social_links;
        unset($attributes[$request->key]);
        $site->ext_socials = json_encode(array_values($attributes));
        $site->save();
        return response()->json(['success'=>true]);
    }
}
