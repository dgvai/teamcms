<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'total_members' => User::where('status',1)->count(),
        ];
        return view('admin.pages.dashboard',['count' => (object)$data]);
    }
}
