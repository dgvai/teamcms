<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entities\SiteBasics;
use App\Models\Entities\SiteBulletines;
use App\Models\Entities\SiteGallery;
use App\Models\Entities\SiteSocials;
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
        $icons = json_decode(file_get_contents(public_path('datasets/socials.json')));
        $links = SiteSocials::all();
        return view('admin.pages.manage-basic',['icons' => $icons,'links' => $links]);
    }

    public function bulletin()
    {
        $bullets = SiteBulletines::all();
        return view('admin.pages.manage-bulletins',['bullets' => $bullets]);
    }

    public function gallery()
    {
        $galleries = SiteGallery::all();
        return view('admin.pages.manage-gallery',['galleries' => $galleries]);
    }

    public function addGallery(Request $request)
    {
        if($request->hasFile('images'))
        {
            foreach($request->images as $image)
            {
                $filename = 'TCMS-gallery-'.rand(1000,9999).'-DG-'.rand(1000,9999).'.'.$image->extension();
                $image->storeAs('gallery',$filename,'public');
                $gallery = new SiteGallery;
                $gallery->caption = $request->caption;
                $gallery->image = $filename;
                $gallery->save();
            }
            
            if($gallery->save())
            {
                return redirect()->back()->with('toast_success','Successfully added!');
            }
        }
    }

    public function updateGallery(Request $request)
    {
        $gal = SiteGallery::find($request->id);
        $gal->caption = $request->caption;
        $gal->save();
        return redirect()->back()->with('toast_success','Updated!');
    }

    public function deleteGallery(Request $request)
    {
        $gal = SiteGallery::find($request->id);
        $gal->delete();
        return response()->json(['success'=> true]);
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

    public function addSiteLinks(Request $request)
    {
        $link = new SiteSocials();
        $link->name = $request->name;
        $link->url = $request->url;
        $link->icon = $request->icon;
        if($link->save())
        {
            return redirect()->back()->with('toast_success','New link added!');
        }
    }

    public function deleteSiteLinks(Request $request)
    {
        $link = SiteSocials::find($request->id);
        $link->delete();
        return response()->json(['success' => true]);
    }

    public function addSitebulletin(Request $request)
    {
        $bullet = new SiteBulletines();
        $bullet->news = $request->news;
        if($bullet->save())
        {
            return redirect()->back()->with('toast_success','News has been added!');
        }
    }

    public function activeBulletin(Request $request)
    {
        $bullet = SiteBulletines::find($request->id);
        $bullet->state = true;
        $bullet->save();
        return response()->json(['success' => true]);
    }

    public function deactiveBulletin(Request $request)
    {
        $bullet = SiteBulletines::find($request->id);
        $bullet->state = false;
        $bullet->save();
        return response()->json(['success' => true]);
    }

    public function deleteBulletin(Request $request)
    {
        $bullet = SiteBulletines::find($request->id);
        $bullet->delete();
        return response()->json(['success' => true]);
    }
}
