<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entities\SiteBasics;
use App\Models\Team\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod|writer']);
    }

    public function index()
    {
        $data = [
            'new_members' => User::where('status',0)->count(),
            'total_members' => User::where('status',1)->where('roll_id','!=',0)->count(),
            'current_members' => User::where('status',1)->where('roll_id','!=',0)->where('designation','!=',0)->count(),
            'committee_members' => (SiteBasics::first()->member_rank != null) ? User::where('designation','!=',SiteBasics::first()->member_rank)->where('designation','!=','0')->where('status',1)->count() : 0,
            'alumni_members' => User::where('status',5)->count(),
        ];
        return view('admin.pages.dashboard',['count' => (object)$data]);
    }
}
