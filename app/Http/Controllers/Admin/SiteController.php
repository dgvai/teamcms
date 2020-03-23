<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entities\SiteBasics;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root|admin|mod']);
    }

    public function theme()
    {
        return view('admin.pages.manage-theme');
    }

    public function changeTheme(Request $request)
    {
        $site = SiteBasics::first();
        $site->theme_color_primary = $request->primary_color;
        $site->theme_color_secondary = $request->secondary_color;
        $site->save();
        return redirect()->back()->with('toast_success','Theme colors has been changed!');
    }
}
