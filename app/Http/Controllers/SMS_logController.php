<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SMS_log;
use Illuminate\Support\Facades\DB;

class SMS_logController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sms_logs = SMS_log::orderBy('SMS_id', 'desc')->paginate(5);
        return view('pages.logGrid')->with('sms_logs', $sms_logs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.logForm');
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
            'user_id' => 'required',
            'user_name' => 'required',
            'SMS_title' => 'required',
            'SMS_description' => 'required',
            'customer_telephone' => 'required',
        ]);
        $sms_log = new SMS_log;
        $sms_log->user_id = $request->input('user_id');
        $sms_log->user_name = $request->input('user_name');
        $sms_log->SMS_title = $request->input('SMS_title');
        $sms_log->SMS_description = $request->input('SMS_description');
        $sms_log->customer_telephone = $request->input('customer_telephone');
        $sms_log->save();
        //Using "success" from messages page in include folder 
        return redirect('/sms_log')->with('success', 'Log created');
    }
    
    // Get sms_id whenever a log is pressed
    public function showLog(Request $request)
    {
        $sms_id = $request->sms_id;
        $post =  DB::select(DB::raw('SELECT * FROM s_m_s_logs WHERE SMS_id = ?'),[$sms_id]);
        return view('pages.showLog')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
      */
    public function editLog(Request $request)
    {
        $sms_id = $request->sms_id;
        $log =  DB::select(DB::raw('SELECT * FROM s_m_s_logs WHERE SMS_id = ?'),[$sms_id]);
        return view('pages.editLog')->with('log',$log);
    }

    // * Update the specified resource in storage.
    // *
    // * @param  \Illuminate\Http\Request  $request
    // * @return \Illuminate\Http\Response
    // */
    public function updateLog(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'user_name' => 'required',
            'SMS_title' => 'required',
            'SMS_description' => 'required',
            'customer_telephone' => 'required',
            'updated_at' => 'required',
        ]);
        $log_id = $request->sms_id;  
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $SMS_title = $request->input('SMS_title');
        $SMS_description = $request->input('SMS_description');
        $customer_telephone = $request->input('customer_telephone');
        $updated_at = $request->input('updated_at');
        
        $sms_log = DB::table('s_m_s_logs')
              ->where('SMS_id', $log_id)
              ->update(['user_id' => $user_id, 'user_name' => $user_name, 
                        'SMS_title' => $SMS_title, 'SMS_description' => $SMS_description, 
                        'customer_telephone' => $customer_telephone, 'updated_at' => $updated_at]);
        //Using "success" from messages page in include folder 
        return redirect('/sms_log')->with('success', 'Log updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function deleteLog(Request $request)
    {
        $log_id = $request->sms_id;
        $sms_log = DB::delete(DB::raw('DELETE FROM s_m_s_logs WHERE SMS_id = ?'),[$log_id]);
        //Using "success" from messages page in include folder 
        return redirect('/sms_log')->with('success', 'Log deleted');
    }
    
    //Returns SMS_log from user query
    public function showQuery(Request $request){
        $this->validate($request, [
            'user_id' => 'required',
            'SMS_title' => 'required',
        ]);

        $user_id = $request->input('user_id');
        $SMS_title = $request->input('SMS_title');

        $sms_logs = DB::table('s_m_s_logs')
                    ->where('user_id',$user_id )
                    ->orWhere('SMS_title', $SMS_title)
                    ->get();

        return view('pages.logQuery')->with('sms_logs',$sms_logs);
    }

}
