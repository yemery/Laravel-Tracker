<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Project;
use App\Models\Dashboard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $UserInfos=new NeededInfos;
        $UserProjects=$UserInfos->getUserProjects();
        $today=Carbon::today()->format('Y-m-d');
        $UserTasks=$UserInfos->getUserTasks();

      
        return view('Dashboard.index', [
            'tasks' => $UserTasks->where('tasks.deadline','>=',$today)
            ->where('tasks.is_completed','!=','completed')
            ->select('tasks.*',DB::raw('DATEDIFF(tasks.deadline,NOW()) as daysLeft'))
            ->orderBy('tasks.deadline', 'desc')
            ->limit(5)
            ->get(),
            'progressions' => DB::table(DB::raw("(SELECT COUNT(id) as countA, project_id FROM tasks WHERE is_completed='completed' GROUP BY project_id) as A"))
                ->join("projects", "A.project_id", "=", "projects.id")
                ->selectRaw("(A.countA / (SELECT COUNT(id) FROM tasks B WHERE A.project_id = B.project_id)) * 100 as prog, A.project_id, projects.*")
                ->limit(5)->get(),
            'undoneTasks'=>$UserTasks ->whereIn('tasks.is_completed', ['in progress','not started'])
            ->where('tasks.deadline','<=',$today)
            ->select('tasks.*', DB::raw('DATEDIFF(tasks.deadline, NOW()) as lateBy'))
            ->orderBy('tasks.deadline', 'desc')
            ->limit(5)
            ->get(),
            'userName'=>$UserInfos->getUserInfo()->first_name
        ]);


    
           
    }
    public function progresseBar($projects,$tasks)
    {
        
        foreach ($projects as $project) {
        $completed_tasks = $tasks::where('project_id', $project->id)->where('completed', true)->count();
        $total_tasks = $project->tasks()->count();
        $project->progress = $total_tasks > 0 ? ($completed_tasks / $total_tasks) * 100 : 0;


    }
    return $projects;
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Task::where('project_id', Project::find($id_project))
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDashboardRequest  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDashboardRequest $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
