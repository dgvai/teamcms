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
        $site = SiteBasics::first();

        if($request->hasFile('logo'))
        {
            $filename = 'TCMS-logo-'.$site->name.'-'.rand(1000,9999).'.'.$request->logo->extension();
            $site->logo = $filename;
            $request->logo->storeAs('sitebasics',$filename,'public');
            $site->save();
        }

        if($request->hasFile('logo_alt'))
        {
            $filename = 'TCMS-logo-alt-'.$site->name.'-'.rand(1000,9999).'.'.$request->logo_alt->extension();
            $site->logo_alt = $filename;
            $request->logo_alt->storeAs('sitebasics',$filename,'public');
            $site->save();
        }

        if($request->hasFile('favicon'))
        {
            $filename = 'TCMS-favicon-'.$site->name.'-'.rand(1000,9999).'.'.$request->favicon->extension();
            $site->favicon = $filename;
            $request->favicon->storeAs('sitebasics',$filename,'public');
            $site->save();
        }

        return redirect()->back()->with('toast_success','Changed images!');
    }

    public function changeBasiccontact(Request $request)
    {
        $site = SiteBasics::first();
        $metas = json_decode($site->contacts,true);
        $metas['phone'] = $request->phone;
        $metas['email'] = $request->email;
        $metas['address'] = $request->address;

        $site->contacts = json_encode($metas);
        if($site->save())
        {
            return redirect()->back()->with('toast_success','Site contacts updated!');
        }
    }

    public function changeBasicmeta(Request $request)
    {
        $site = SiteBasics::first();
        $metas = json_decode($site->meta_page_titles,true);
        $metas['home'] = $request->home;
        $metas['committee'] = $request->committee;
        $metas['members'] = $request->members;
        $metas['alumnis'] = $request->alumnis;
        $metas['events'] = $request->events;
        $metas['blogs'] = $request->blogs;
        $metas['about'] = $request->about;
        $site->meta_page_titles = json_encode($metas);
        if($site->save())
        {
            return redirect()->back()->with('toast_success','Site meta updated!');
        }
    }
}
