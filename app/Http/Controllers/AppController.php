<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Validation\Validator;
use Validator;
use DataTables;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Auth::user();

        if ($user->user_type == 'admin') {
            $apps = App::orderBy('id', 'DESC');
        } else {
            $user_apps = $user->apps->pluck('app_id');
            $apps = App::whereIn('id', $user_apps)->orderBy('id', 'DESC');
        }


        if ($request->ajax()) {
            return DataTables::of($apps)

                ->editColumn('app_logo', function ($app) {

                    return '<img class="img-sm img-thumbnail" src="' . asset($app->app_logo) . '">';
                })
                ->addColumn('_app', function ($app) {

                    return 'ID: <a href="javascript:void(0);">' . $app->app_unique_id . '</a><br>Name: ' . $app->app_name;
                })
                ->addColumn('status', function ($app) {
                    return $app->status == 1 ? status(_lang('Active'), 'success') : status(_lang('In-Active'), 'danger');
                })
                ->addColumn('action', function ($app) use ($user) {

                    $action = '<div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            ' . _lang('Action') . '
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                    $action .= '<a href="' . route('apps.edit', $app->id) . '" class="dropdown-item">
                                        <i class="fas fa-edit"></i>
                                        ' . _lang('Edit') . '
                                    </a>';
                    // if ($user->user_type == 'admin') {
                    $action .= '<form action="' . route('apps.destroy', $app->id) . '" method="post" class="ajax-delete">'
                        . csrf_field()
                        . method_field('DELETE')
                        . '<button type="submit" class="btn-remove dropdown-item">
                                        <i class="fas fa-trash-alt"></i>
                                        ' . _lang('Delete') . '
                                    </button>
                                </form>';
                    // }

                    $action .= '</div>
                                </div>';
                    return $action;
                })
                ->rawColumns(['app_logo', '_app', 'status', 'action'])
                ->make(true);
        }

        return view('backend.apps.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.apps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input();
        $validator = \Validator::make($request->all(), [

            // 'app_unique_id' => 'required|string|max:191',
            'app_name' => 'required|string|max:191',
            'app_logo' => 'nullable|image',
            'onesignal_app_id' => 'required|string|max:191',
            'onesignal_api_key' => 'required|string|max:191',
            'app_publishing_control' => 'required|string|max:20',
            'ads_control' => 'required|string|max:20',
            'ios_app_publishing_control' => 'required|string|max:20',
            'ios_ads_control' => 'required|string|max:20',
            'privacy_policy' => 'nullable|string|max:191',
            'facebook' => 'nullable|string|max:191',
            'telegram' => 'nullable|string|max:191',
            'youtube' => 'nullable|string|max:191',
            'enable_countries' => 'required',
            'status' => 'required',

        ]);

        if ($validator->fails()) {
            // if ($request->ajax()) {
            //     return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            // } else {
            return back()->withErrors($validator)->withInput();
            // }
        }

        $app = new App();
        $app->app_unique_id  = $request->app_unique_id;
        $app->app_name = $request->app_name;
        $app->onesignal_app_id = $request->onesignal_app_id;
        $app->onesignal_api_key = $request->onesignal_api_key;
        $app->app_publishing_control = $request->app_publishing_control;
        $app->ads_control = $request->ads_control;
        $app->ios_share_link = $request->ios_share_link;
        $app->ios_app_publishing_control = $request->ios_app_publishing_control;
        $app->ios_ads_control = $request->ios_ads_control;
        $app->privacy_policy = $request->privacy_policy;
        $app->facebook = $request->facebook;
        $app->telegram = $request->telegram;
        $app->youtube = $request->youtube;
        $app->enable_countries = json_encode($request->enable_countries);
        $app->status = $request->status;

        if ($request->hasFile('app_logo')) {
            $file = $request->file('app_logo');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path('public/uploads/images/'), $file_name);
            $app->app_logo = 'uploads/images/' . $file_name;
        }

        $app->save();

        // if (!$request->ajax()) {
        return redirect('apps')->with('success', _lang('Information has been added sucessfully'));

        // } else {
        //     return response()->json(['result' => 'success', 'redirect' => url('apps'), 'message' => _lang('Information has been added sucessfully')]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app = App::find($id);
        return view('backend.apps.edit', compact('app'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [

            'app_name' => 'required|string|max:191',
            'app_logo' => 'nullable|image',
            'onesignal_app_id' => 'required|string|max:191',
            'onesignal_api_key' => 'required|string|max:191',
            'app_publishing_control' => 'required|string|max:20',
            'ads_control' => 'required|string|max:20',
            'ios_app_publishing_control' => 'required|string|max:20',
            'ios_ads_control' => 'required|string|max:20',
            'privacy_policy' => 'nullable|string|max:191',
            'facebook' => 'nullable|string|max:191',
            'telegram' => 'nullable|string|max:191',
            'youtube' => 'nullable|string|max:191',
            'enable_countries' => 'required',
            'status' => 'required'

        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return back()->withErrors($validator)->withInput();
            }
        }

        $user = \Auth::user();

        if ($user->user_type == 'admin') {
            $app = App::find($id);
        } else {
            $user_apps = $user->apps->pluck('app_id');
            $app = App::whereIn('id', $user_apps)->first();
        }



        $app->app_name = $request->app_name;
        $app->onesignal_app_id = $request->onesignal_app_id;
        $app->onesignal_api_key = $request->onesignal_api_key;
        $app->app_publishing_control = $request->app_publishing_control;
        $app->ads_control = $request->ads_control;
        $app->ios_share_link = $request->ios_share_link;

        $app->ios_app_publishing_control = $request->ios_app_publishing_control;
        $app->ios_ads_control = $request->ios_ads_control;
        $app->privacy_policy = $request->privacy_policy;
        $app->facebook = $request->facebook;
        $app->telegram = $request->telegram;
        $app->youtube = $request->youtube;
        $app->enable_countries = json_encode($request->enable_countries);
        $app->status = $request->status;

        if ($request->hasFile('app_logo')) {
            $file = $request->file('app_logo');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(base_path('public/uploads/images/'), $file_name);
            $app->app_logo = 'public/uploads/images/' . $file_name;
        }

        $app->save();

        if (!$request->ajax()) {
            return redirect('apps')->with('success', _lang('Information has been updated sucessfully'));
        } else {
            return response()->json(['result' => 'success', 'redirect' => url('apps'), 'message' => _lang('Information has been updated sucessfully')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $app = App::find($id);
        $app->delete();

        // user_app::where('app_id', $id)->delete();

        if (!$request->ajax()) {
            return redirect('apps')->with('success', _lang('Information has been deleted'));
        } else {
            return response()->json(['result' => 'success', 'message' => _lang('Information has been deleted sucessfully')]);
        }
    }
}