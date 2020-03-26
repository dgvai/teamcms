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
        $timezones = json_decode(file_get_contents(public_path('datasets/timezone.json')));
        return view('admin.pages.config',['timezones' => $timezones]);
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

    public function app(Request $request)
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

    public function db(Request $request)
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
