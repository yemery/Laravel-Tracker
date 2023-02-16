<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TaskController;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use function GuzzleHttp\Promise\task;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Project.index', [
            'projects' => Project::orderBy('id', 'desc')->simplePaginate(6),
            'progressions' => $this->progression()
            // does not work as i wanted, it just combines values in seperate rows
            // 'combined' => array_merge(Project::orderBy('id', 'desc')->get()->toArray(), $this->progression()->toArray())
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
        // $request=$request->all();
        Project::create([
            'title' => $request->title,
            'created_at' => Carbon::now(),
            // 'user_id'=>$request->status,
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
        // $pProgs=DB::table(DB::raw("(SELECT COUNT(id) as countA, project_id FROM tasks WHERE is_completed='completed' GROUP BY project_id) as A"))
        //     ->selectRaw("(A.countA / (SELECT COUNT(id) FROM tasks B WHERE A.project_id = B.project_id)) * 100 as prog, A.project_id")
        //     ->orderBy('prog','desc')->get();

        // cus we need also the information of the project anzidou join m3a project table 
        // $progressionPerProject = DB::table(DB::raw("(SELECT COUNT(id) as countA, project_id FROM tasks WHERE is_completed='completed' GROUP BY project_id) as A"))
        //     ->join("projects", "A.project_id", "=", "projects.id")
        //     ->selectRaw("(A.countA / (SELECT COUNT(id) FROM tasks B WHERE A.project_id = B.project_id)) * 100 as prog, A.project_id, projects.*")
        //     ->orderBy('id')->get();

        // return multiple views with same param cus ana ma7tajaha f dashborad o nta f project 
        // $views = [

        //    view('Dashboard.index',['pProgs'=>$projects_with_prog] ),
        //     // view('users.members', compact('data')),

        // ];
        // return $progressionPerProject;

        $project_ids = [];
        $idsQuery = DB::table('projects')->select('id')->get();

        foreach ($idsQuery as $value) {
            array_push($project_ids, $value->id);
        }

        $results = [];

        $tasks = null;
        $progression = null;
        $completed = null;

        foreach ($project_ids as $id) {
            $tasks = Task::where('project_id', $id)
                ->count();
            if ($tasks == 0) {
                $progression = 0;
            } else {
                $completed = Task::where('project_id', $id)
                    ->where('is_completed', 'completed')
                    ->count();
                $progression = intval($completed * 100 / $tasks);
            }
            $results[$id] = $progression;
        }

        return  $results;
    }
}
