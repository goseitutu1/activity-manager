<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('id', 'desc')->paginate(5);
        return view('pages.activityGrid')->with('activities', $activities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.activityForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'sms_count' => 'required',
            'user_id' => 'required',
            'user_name' => 'required',
            'activity_title' => 'required',
            'remark' => 'required',
        ]);
        $activity = new Activity;
        $activity->status = $request->input('status');
        $activity->sms_count = $request->input('sms_count');
        $activity->user_id = $request->input('user_id');
        $activity->user_name = $request->input('user_name');
        $activity->activity_title = $request->input('activity_title');
        $activity->remark = $request->input('remark');
        $activity->auth_id=auth()->user()->id;
        $activity->save();
        //Using "success" from messages page in include folder 
        return redirect('/activityGrid')->with('success', 'Log created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity =  DB::select(DB::raw('SELECT * FROM activities WHERE id = ?'),[$id]);
        return view('pages.showActivity')->with('activity',$activity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity =  DB::select(DB::raw('SELECT * FROM activities WHERE id = ?'),[$id]);
        return view('pages.editActivity')->with('activity',$activity);
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
        $this->validate($request, [
            'status' => 'required',
            'sms_count' => 'required',
            'user_id' => 'required',
            'user_name' => 'required',
            'activity_title' => 'required',
            'remark' => 'required',
            'updated_at' => 'required',
        ]); 
        $status = $request->input('status');
        $sms_count = $request->input('sms_count');
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $activity_title = $request->input('activity_title');
        $remark = $request->input('remark');
        $updated_at = $request->input('updated_at');
        
        $sms_log = DB::table('activities')
              ->where('id', $id)
              ->update(['user_id' => $user_id, 'user_name' => $user_name, 
                        'activity_title' => $activity_title, 'SMS_count' => $sms_count, 
                        'status' => $status,  'remark' => $remark,
                         'updated_at' => $updated_at]);
        //Using "success" from messages page in include folder 
        return redirect('/activityGrid')->with('success', 'Log updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        return redirect('/activityGrid')->with('success', 'Activity deleted');
    }

    public function showQuery(Request $request){
        $this->validate($request, [
            'user_id' => 'required',
            'activity_title' => 'required',
        ]);

        $user_id = $request->input('user_id');
        $activity_title = $request->input('activity_title');

        $data = DB::table('activities')
                    ->where('user_id',$user_id )
                    ->orWhere('activity_title', $activity_title)
                    ->get();

        return view('pages.activityQuery')->with('data',$data);
    }

    public function queryDate(Request $request){
        $date_data = array(
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date')
        );
        $activities = Activity::whereBetween('created_at', [$date_data['start_date'], $date_data['end_date']])->get();

        return view('pages.activityGrid')->with('activities', $activities);
        // return($data);
        // return redirect('/activityGrid');
    }

}
