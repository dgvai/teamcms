<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entities\UserDesignations;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function showIndex()
    {
        $total = UserDesignations::all();
        $active = UserDesignations::where('active',1)->get();
        return view('admin.pages.designations',['total' => $total, 'active' => $active]);
    }

    public function addNew(Request $request)
    {
        if($request->name != null || $request->value != null)
        {
            $designation = new UserDesignations();
            $designation->name = $request->name;
            $designation->value = $request->value;
            $designation->save();
            return redirect()->back()->with('toast_success','Designation Added');
        }
        else
        {
            return redirect()->back()->with('toast_error','Missing Parameter');
        }
        
    }

    public function getDesignationData()
    {
        $active = UserDesignations::where('active',1)->orderBy('value','asc')->get();
        return response()->json($active);
    }

    public function uprank(Request $request)
    {
        $rankToUp = UserDesignations::find($request->did);
        $rank = $rankToUp->value;
        if($rank > 1)
        {
            $rankToDown = UserDesignations::where('value',$rank-1)->first();
            $rankToUp->value = $rankToDown->value;
            $rankToDown->value = $rank;
            $rankToUp->save();
            $rankToDown->save();
            return response()->json(['success' => true]);
        }
        else
        {

            return response()->json(['error' => true]);
        }
    }

    public function downrank(Request $request)
    {
        $rankToDown = UserDesignations::find($request->did);
        $rank = $rankToDown->value;
        $lastRank = UserDesignations::orderBy('value','desc')->first();
        if($rank < $lastRank->value)
        {
            $rankToUp = UserDesignations::where('value',$rank+1)->first();
            $rankToDown->value = $rankToUp->value;
            $rankToUp->value = $rank;
            $rankToUp->save();
            $rankToDown->save();
            return response()->json(['success' => true]);
        }
        else
        {

            return response()->json(['error' => true]);
        }
    }

    public function deactivateRank(Request $request)
    {
        $rankToDeactive = UserDesignations::find($request->did);
        $rank = $rankToDeactive->value;
        $bellowRanks = UserDesignations::where('value','>',$rank)->get();
        foreach($bellowRanks as $ranked)
        {
            $ranked->value -= 1;
            $ranked->save();
        }
        $rankToDeactive->value = null;
        $rankToDeactive->active = 0;
        $rankToDeactive->save();
        return response()->json(['success' => true]);
    }

    public function activateRank(Request $request)
    {
        $rankToActive = UserDesignations::find($request->did);
        $rank = $request->rank;
        $bellowRanks = UserDesignations::where('value','>=',$rank)->get();
        foreach($bellowRanks as $ranked)
        {
            $ranked->value += 1;
            $ranked->save();
        }
        $rankToActive->value = $rank;
        $rankToActive->active = 1;
        $rankToActive->save();
        return response()->json(['success' => true]);
    }
}
