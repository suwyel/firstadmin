<?php

namespace App\Http\Controllers\install;

use Config;
use App\Utilities\Installer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Redirect;

class InstallController extends Controller
{
    public function __construct()
    {
        if (env('APP_INSTALLED', false) == true) {
            Redirect::to('/')->send();
        }
    }
    public function index()
    {

        $requirements = Installer::checkServerRequirements();
        return view('backend.install.step_1', compact('requirements'));
    }
    public function database()
    {

        $requirements = Installer::checkServerRequirements();
        return view('backend.install.step_2', compact('requirements'));
    }
    public function process_install(Request $request)
    {
        $host = $request->hostname;
        $database = $request->database;
        $username = $request->username;
        $password = $request->password;

        if (Installer::createDbTables($host, $database, $username, $password) == false) {
            return redirect()->back()->with("error", "Invalid Database Settings !");
        }

        return redirect('install/create_user');
    }
    public function create_user()
    {
        return view('backend.install.step_3');
    }
    public function store_user(Request $request)
    {
        $validator = \Validator::make($request->all(), [

            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $password = Hash::make($request->password);

        Installer::createUser($first_name, $last_name, $email, $password);

        return redirect('install/system_settings');
    }
    public function system_settings()
    {
        return view('backend.install.step_4');
    }
    public function final_touch(Request $request)
    {
        Installer::updateSettings($request->all());
        Installer::finalTouches();
        \Artisan::call('config:clear');
        \Artisan::call('cache:clear');
        return redirect('/');
    }

}