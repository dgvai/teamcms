<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserManagement()
    {
        $newUsers = User::where('status',0)->get();
        $rejectedUsers = User::where('status',9)->get();
        return view('admin.pages.user-mgmt',
                    ['newUsers' => $newUsers,
                    'rejectedUsers' => $rejectedUsers]);
    }

    public function getUser(Request $request)
    {
        $user = User::find($request->uid);
        $user->details;
        return response()->json($user);
    }

    public function approveUser(Request $request)
    {
        $user = User::find($request->uid);
        $user->status = 1;
        return response()->json(($user->save()) ? ['success' => true] : ['error' => true]);
    }

    public function rejectUser(Request $request)
    {
        $user = User::find($request->uid);
        $user->status = 9;
        return response()->json(($user->save()) ? ['success' => true] : ['error' => true]);
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->uid);
        return response()->json(($user->delete()) ? ['success' => true] : ['error' => true]);
    }
}
