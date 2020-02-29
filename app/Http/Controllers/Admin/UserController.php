<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entities\SiteBasics;
use App\Models\Team\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin']);
    }

    public function showUserManagement()
    {
        $newUsers = User::where('status',0)->get();
        $rejectedUsers = User::where('status',9)->get();
        $unassignedUsers = User::where('designation',0)->where('status',1)->where('roll_id','>',0)->get();
        $memberUsers = (SiteBasics::first()->member_rank != null) ? User::where('designation',SiteBasics::first()->member_rank)->where('status',1)->get() : null;
        $committeeUsers = (SiteBasics::first()->member_rank != null) ? User::where('designation','!=',SiteBasics::first()->member_rank)->where('designation','!=','0')->where('status',1)->get() : null;
        $currentMembers = User::where('status',1)->where('roll_id','!=',0)->where('designation','!=',0)->get();
        $alumniUsers = User::where('status',5)->get();
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
