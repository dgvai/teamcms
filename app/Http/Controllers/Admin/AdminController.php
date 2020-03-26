<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs\Blogs;
use App\Models\Entities\SiteBasics;
use App\Models\Entities\SiteBulletines;
use App\Models\Entities\SiteGallery;
use App\Models\Events\Events;
use App\Models\Team\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod']);
    }

    public function index()
    {
        $data = [
            'new_members' => User::new()->count(),
            'total_members' => User::total()->count(),
            'current_members' => User::current()->count(),
            'committee_members' => (SiteBasics::first()->member_rank != null) ? User::committee()->count() : 0,
            'alumni_members' => User::alumnis()->count(),
            'new_blogs' => Blogs::new()->count(),
            'upcoming_events' => Events::upcomings()->count(),
            'total_events' => Events::all()->count(),
            'total_blogs'  => Blogs::active()->count(),
            'total_bulletins'  => SiteBulletines::active()->count(),
            'total_gallery'  => SiteGallery::all()->count(),
        ];
        return view('admin.pages.dashboard',['count' => (object)$data]);
    }
}
