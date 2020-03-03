<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Entities\SiteBasics;
use App\Models\Team\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function showCommittee()
    {
        $committee_members = (SiteBasics::first()->member_rank != null) ? User::committee()->get() : null;
        return view('frontend.committee',['members' => $committee_members]);
    }

    public function showMembers()
    {
        $current_members = User::current()->get();
        return view('frontend.members',['members' => $current_members]);
    }

    public function showAlumnis()
    {
        $alumni_members = User::alumnis()->get();
        return view('frontend.alumnis',['members' => $alumni_members]);
    }
}
