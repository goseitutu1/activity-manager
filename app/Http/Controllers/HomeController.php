<?php

namespace App\Http\Controllers;
use App\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth_id = auth()->user()->id;
        $activities =  DB::select(DB::raw('SELECT * FROM activities WHERE auth_id = ?'),[$auth_id]);
        return view('home')->with('activities',$activities);
    }
}
