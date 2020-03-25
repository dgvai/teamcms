<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:root']);
    }

    public function index()
    {
        return view('admin.pages.config');
    }

    public function mail(Request $request)
    {
        $config = $request->except('_token');
        $update = updateEnv($config);

        if(boolval($update) == true)
        {
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            
            return redirect()->back()->with('toast_success','The environment configuration has been updated!');
        }
    }
}
