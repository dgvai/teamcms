<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entities\SiteBasics;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod']);
    }

    public function theme()
    {
        return view('admin.pages.manage-theme');
    }

    public function basic()
    {
        return view('admin.pages.manage-basic');
    }

    public function changeTheme(Request $request)
    {
        $site = SiteBasics::first();
        $site->theme_color_primary = $request->primary_color;
        $site->theme_color_secondary = $request->secondary_color;
        $site->save();
        return redirect()->back()->with('toast_success','Theme colors has been changed!');
    }

    public function changeBanner(Request $request)
    {
        $site = SiteBasics::first();

        if($request->hasFile('home_banner'))
        {
            $filename = 'TCMS-home-'.$site->name.'-'.rand(1000,9999).'-'.rand(1000,9999).'.'.$request->home_banner->extension();
            $site->home_banner = $filename;
            $request->home_banner->storeAs('sitebasics',$filename,'public');
            $site->save();
        }

        if($request->hasFile('about_banner'))
        {
            $filename = 'TCMS-about-'.$site->name.'-'.rand(1000,9999).'-'.rand(1000,9999).'.'.$request->about_banner->extension();
            $site->about_banner = $filename;
            $request->about_banner->storeAs('sitebasics',$filename,'public');
            $site->save();
        }

        if($request->hasFile('home_counter_bg'))
        {
            $filename = 'TCMS-counter-bg-'.$site->name.'-'.rand(1000,9999).'-'.rand(1000,9999).'.'.$request->home_counter_bg->extension();
            $site->home_counter_bg = $filename;
            $request->home_counter_bg->storeAs('sitebasics',$filename,'public');
            $site->save();
        }

        return redirect()->back()->with('toast_success','Changed banners!');
    }

    public function changeBasicText(Request $request)
    {
        $site = SiteBasics::first();
        $site->name = $request->name;
        $site->fullname = $request->fullname;
        $site->tagline = $request->tagline;
        $site->short_description = $request->short_description;
        if($site->save())
        {
            return redirect()->back()->with('toast_success','Site updated!');
        }
    }

    public function changeBasicimage(Request $request)
    {
        
    }
}
