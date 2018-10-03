<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $project = DB::table('project_user')
            ->select('projects.id','projects.name', 'projects.cost', 'projects.final_date')
            ->join('projects', 'project_id', '=' ,'projects.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->where('user_id', '=', $user_id)
            ->paginate(5);
        return $project;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = ProjectController::index();
        return view('project.main-project')
            ->with('project', $project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $final =    substr($request->input('final_date'), 6, 4) . '-' .
                    substr($request->input('final_date'), 3,2) . '-' .
                    substr($request->input('final_date'), 0,2);
        $user_id = Auth::id();
        $request->merge([
            'final_date' => $final,
            'user_id' =>$user_id
        ]);
        $project = Project::create($request->all());
        $project->users()->attach($user_id);
        return redirect('projects/create')
            ->with('project', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('project.edit', ['project' => Project::findOrFail($id)]);
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
