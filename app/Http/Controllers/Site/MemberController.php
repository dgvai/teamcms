<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Team\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function showCommittee()
    {
        // $users = User::where('designation','>',0)->where('roll_id','!=',0)->get();
        return view('frontend.committee');
    }

    public function showMembers()
    {
        // $users = User::where('designation','>',0)->where('roll_id','!=',0)->get();
        return view('frontend.members');
    }
}
