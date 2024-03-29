<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApproveUser;
use App\Models\Entities\SiteBasics;
use App\Models\Team\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin']);
    }

    public function showUserManagement()
    {
        $newUsers = User::new()->get();
        $rejectedUsers = User::rejecteds()->get();
        $unassignedUsers = User::unassigned()->get();
        $memberUsers = (SiteBasics::first()->member_rank != null) ? User::members()->get() : null;
        $committeeUsers = (SiteBasics::first()->member_rank != null) ? User::committee()->get() : null;
        $currentMembers = User::current()->get();
        $alumniUsers = User::alumnis()->get();

        return view('admin.pages.user-mgmt',
                    ['newUsers' => $newUsers,
                    'rejectedUsers' => $rejectedUsers,
                    'unassignedUsers' => $unassignedUsers,
                    'memberUsers' => $memberUsers,
                    'committeeUsers' => $committeeUsers,
                    'currentMembers' => $currentMembers,
                    'alumniUsers' => $alumniUsers,
                    ]);
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
        Mail::to($user->email)->queue(new ApproveUser);
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

    public function assignUser(Request $request)
    {
        $user = User::find($request->uid);
        $rank = $request->rank;
        $user->designation = $rank;
        $user->save();
        return redirect()->back()->with('toast_success','Membership Assigned!');
    }

    public function promoteUser(Request $request)
    {
        $user = User::find($request->uid);
        $rank = $request->rank;
        $user->designation = $rank;
        $user->save();
        return redirect()->back()->with('toast_success','Member has been promoted!');
    }

    public function manageUser(Request $request)
    {
        $user = User::find($request->uid);
        $rank = $request->rank;
        $user->designation = $rank;
        $user->save();
        return redirect()->back()->with('toast_success','Member was updated!');
    }

    public function moveAlumniUser(Request $request)
    {
        $user = User::find($request->uid);
        $user->status = 5;
        $user->save();
        return response()->json(['success' => true]);
    }

    public function movebackAlumniUser(Request $request)
    {
        $user = User::find($request->uid);
        $user->status = 1;
        $user->save();
        return response()->json(['success' => true]);
    }

    public function deleteAlumniUser(Request $request)
    {
        $user = User::find($request->uid);
        $user->delete();
        return response()->json(['success' => true]);
    }
}
