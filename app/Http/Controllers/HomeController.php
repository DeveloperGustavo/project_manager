<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $project = DB::table('projects')
            ->join('project_user', 'project_id', '=', 'projects.id')
            ->where('project_user.user_id', $user);
        $cost = DB::table('projects')
            ->join('project_user', 'project_id', '=', 'projects.id')
            ->select('projects.cost')
            ->where('project_user.user_id', $user);
        return view('home')
            ->with('project', $project)
            ->with('cost', $cost);
    }
}
