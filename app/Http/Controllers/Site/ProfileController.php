<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Team\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($roll_id)
    {
        $user = User::roll($roll_id)->first();
        return view('frontend.profile',['user' => $user]);
    }
}
