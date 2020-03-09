<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Entities\SiteBasics;
use App\Models\Team\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($roll_id)
    {
        $user = User::roll($roll_id)->first();
        return view('frontend.profile',['user' => $user]);
    }

    public function edit_profile($roll_id)
    {
        $user = User::roll($roll_id)->first();
        if(auth()->user()->id == $user->id)
        {
            $extra = SiteBasics::first()->extra_infos;
            return view('frontend.edit-profile',['user' => $user, 'extra' => $extra]);
        }
        else 
        {
            return redirect()->back();
        }
        
    }

    public function editBasic(Request $request)
    {
        if(auth()->user()->roll_id == $request->roll_id)
        {
            $user = User::roll($request->roll_id)->first();
            $user->details->first_name = $request->first_name;
            $user->details->last_name = $request->last_name;
            $user->details->birthdate = $request->birthdate;
            $user->details->phone = $request->phone;
            $user->details->department = $request->department;
            $user->details->about = strip_tags($request->about);
            $user->details->save();
            return redirect()->route('user.profile',['roll_id' => $user->roll_id])->with('success',__('Profile has been updated successfully!'));
        }
        else 
        {
            return redirect()->back()->with('success','LoL');
        }
    }

    public function editExtra(Request $request)
    {
        $user = User::roll(auth()->user()->roll_id)->first();
        $keys = array_keys($request->except('_token'));
        $values = array_values($request->except('_token'));
        $data = [];
        foreach($keys as $i => $key)
        {
            $array = [
                'key' => $key,
                'value' => $values[$i]
            ];
            array_push($data,$array);
        }
        $extra = json_encode($data);
        $user->details->extras = $extra;
        $user->details->save();
        return redirect()->route('user.profile',['roll_id' => $user->roll_id])->with('success',__('Profile has been updated successfully!'));
    }

    public function editDP(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $user = User::roll(auth()->user()->roll_id)->first();
            $file = 'TCMS-avatar-user-'.auth()->user()->roll_id.'-'.date('Y-m-d-His').'-'.rand(1000,9999).'.'.$request->avatar->extension();
            $request->avatar->storeAs('users/avatars',$file,'public');
            $user->details->avatar = $file;
            $user->details->save();
            return redirect()->route('user.profile',['roll_id' => $user->roll_id])->with('success',__('Profile has been updated successfully!'));
        }
        else 
        {
            return redirect()->back();
        }
    }
}
