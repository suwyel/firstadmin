<?php

namespace App\Http\Controllers;

use App\Models\LiveMatch;
use App\Models\LiveMatchApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiveMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.live_matches.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.live_matches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request); {

            $validator = \Validator::make($request->all(), [

                'apps' => 'required',
                'match_title' => 'required|string|max:191',
                'team_one_name' => 'required|string|max:191',
                'team_one_image_type' => 'required|string|max:20',
                'team_one_url' => 'nullable|required_if:team_one_image_type,url|url',
                'team_one_image' => 'required_if:team_one_image_type,image|image',
                'team_two_name' => 'required|string|max:191',
                'team_two_image_type' => 'required|string|max:20',
                'team_two_url' => 'nullable|required_if:team_two_image_type,url|url',
                'team_two_image' => 'required_if:team_two_image_type,image|image',
                'status' => 'required',

                'stream_url' => 'required',

            ]);

            if ($validator->fails()) {
                if ($request->ajax()) {
                    return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
                } else {
                    return back()->withErrors($validator)->withInput();
                }
            }



            DB::beginTransaction();

            $user = \Auth::user();

            $live_match = new LiveMatch();

            $live_match->match_title = $request->match_title;
            $live_match->team_one_name = $request->team_one_name;
            $live_match->team_one_image_type = $request->team_one_image_type;
            $live_match->team_one_url = $request->team_one_url;
            $live_match->team_two_name = $request->team_two_name;
            $live_match->team_two_image_type = $request->team_two_image_type;
            $live_match->team_two_url = $request->team_two_url;
            $live_match->stream_url = $request->stream_url;
            $live_match->status = $request->status;
            $live_match->created_by = $user->id;

            if ($request->hasFile('team_one_image')) {
                $image = $request->file('team_one_image');
                $ImageName = time() . rand() . '.' . $image->getClientOriginalExtension();
                $image->save(base_path('public/uploads/images/live_matches/') . $ImageName);
                $live_match->team_one_image = 'public/uploads/images/live_matches/' . $ImageName;
            }

            if ($request->hasFile('team_two_image')) {
                $image = $request->file('team_two_image');
                $ImageName = time() . rand() . '.' . $image->getClientOriginalExtension();
                $image->save(base_path('public/uploads/images/live_matches/') . $ImageName);
                $live_match->team_two_image = 'public/uploads/images/live_matches/' . $ImageName;
            }

            $live_match->save();

            for ($i = 0; $i < count($request->apps); $i++) {

                $app = new LiveMatchApp();

                $app->app_id = $request->apps[$i];
                $app->match_id = $live_match->id;

                $app->save();
            }

            DB::commit();

            if (!$request->ajax()) {
                return redirect('live_matches')->with('success', _lang('Information has been added.'));
            } else {
                return response()->json(['result' => 'success', 'redirect' => url('live_matches'), 'message' => _lang('Information has been added sucessfully.')]);
            }
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}