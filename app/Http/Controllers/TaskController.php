<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $requestsUrl=$request->all();
// $url = $request->url();
// $response = Http::get($url);
// dd($request->fullUrl());
        $filters = new Filter();
        $data = $filters->Filter($request);
// dd($data);
        return view('Task.index', [

            'tasks' => $data->orderBy('tasks.id','asc')->simplePaginate(9),
            
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $projectNames = Project::get();
        return view('Task.create', ['pNames' => $projectNames]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'title' => $request->title,
            'created_at' => Carbon::now()->timestamp,
            'priority' => $request->priority,
            'deadline' => $request->deadline,
            "updated_at" => Carbon::now()->timestamp,
            'project_id' => $request->project_id,
        ]);
        return to_route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Task.show', [
            'task' => Task::join('projects', 'tasks.project_id', '=', 'projects.id')
                ->select('tasks.*', 'projects.title as project_title', DB::raw('DATEDIFF(tasks.deadline,NOW()) as days_left'))
                ->where('tasks.id', '=', $id)
                ->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('Task.edit', [
            'task' => $task,
            'pNames' => Project::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        Task::find($id)->update(
            [
                'title' => $request->title,
                'priority' => $request->priority,
                'is_completed' => $request->is_completed,
                'deadline' => $request->deadline,
                'project_id' => $request->project_id,
                'updated_at' => Carbon::now()
            ]
        );

        return to_route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return to_route('tasks.index');
    }
}
