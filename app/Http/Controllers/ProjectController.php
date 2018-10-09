<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

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
        $task = Task::all()
            ->where('project_id', '=', $id);
        $task_count = count($task);
        $t = $task->where('final_date', '!=', null);
        $task_done = count($t);
        $task_not_done = $task_count - $task_done;
        return view('project.edit', ['project' => Project::findOrFail($id)])
            ->with('task', $task)
            ->with('task_count', $task_count)
            ->with('task_done', $task_done)
            ->with('task_not_done', $task_not_done);
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

    /**
     * Add a new member to a project.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function IncludeMember(Request $request, $id)
    {
        $user_id = DB::table('users')
                ->where('email', '=', $request->input('email'))
                ->value('id');
        $project = Project::findOrFail($id);
        $project->users()->attach($user_id);
        return redirect()->route('projects.show', $project);
    }
}
