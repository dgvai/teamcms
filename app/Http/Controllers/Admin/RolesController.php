<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function settings()
    {
        return view('admin.pages.root-settings');
    }

    public function changePass(Request $request)
    {
        if($request->new_password != $request->new_password2)
        {
            return redirect()->back()->with('toast_error','The new passwords do not match!');
        }
        else
        {
            if(Hash::check($request->old_password,auth()->user()->password))
            {
                $user = auth()->user();
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success',__('Password successfully changed!'));
            }
            else 
            {
                return redirect()->back()->with('toast_error','The old password does not match!');
            }
        }
        
    }
}
