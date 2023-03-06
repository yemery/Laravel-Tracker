<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\NeededInfos;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use function GuzzleHttp\Promise\task;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // use NeededInfos;

    // public $user;
    // public function getUserId()
    // {
    //     $this->user =  Auth::user()->id;
    //     return $this->user;
    // }
    // public $UserInfos;
    // $this->UserInfos=new NeededInfos ;
    // protected static $myStaticVariable = new NeededInfos ;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getController()
    {

        return new NeededInfos;
    }
    public function index()
    {
        return view('Project.index', [
            'projects' => Project::orderBy('id', 'desc')
                // ->join('users', 'user.id', 'projects.user_id')
                ->where('user_id', $this->getController()->getUserInfo()->id)
                ->simplePaginate(6),
            'progressions' => $this->progression()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // $UserInfos=new NeededInfos;

        Project::create([
            'title' => $request->title,
            'created_at' => Carbon::now(),
            'user_id' => $this->getController()->getUserInfo()->id
        ]);
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Project.show', [
            'project' => Project::findOrFail($id),
            'tasks' => Task::where('project_id', Project::findOrFail($id)->id)->simplePaginate(5)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Project.edit', [
            'project' => Project::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        Project::find($project->id)->update(['title' => $request->title]);
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        $tasks = Task::where('project_id', $project->id)->get();
        $tasks_controller = new TaskController;
        foreach ($tasks as $task) {
            $tasks_controller->destroy($task);
        }

        $project->delete();
        return redirect(route('projects.index'));
    }

    public function progression()
    {
        return $this->getController()->progression();
    }
}
