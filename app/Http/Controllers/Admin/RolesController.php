<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root']);
    }

    public function index()
    {
        $users = User::current()->get()->sortBy(function($t){
            return $t->desig->value;
        });
        $power_users = User::withRoles();
        return view('admin.pages.managerial-roles',['users' => $users, 'power_users' => $power_users]);
    }

    public function assign(Request $request)
    {
        $user = User::find($request->user);
        $user->assignRole($request->role);
        
        return redirect()->back()->with('success','The user was assigned to '.strtoupper($request->role).' role!');
    }
    public function remove(Request $request)
    {
        $user = User::find($request->id);

        foreach($user->getRoleNames() as $role)
        {
            $user->removeRole($role);
        }

        return response()->json(['success' => true]);
    }
}
