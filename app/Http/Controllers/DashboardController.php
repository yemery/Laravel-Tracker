<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Dashboard;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today=Carbon::today()->format('Y-m-d');
    
        return view('Dashboard.index', [
            'tasks' => Task::select('tasks.*', DB::raw('DATEDIFF(deadline,created_at) as daysLeft'))->where('deadline','>=',$today)->where('is_completed','!=','completed')->orderBy('deadline', 'desc')->limit(5)->get(),
            'progressions' => DB::table(DB::raw("(SELECT COUNT(id) as countA, project_id FROM tasks WHERE is_completed='completed' GROUP BY project_id) as A"))
                ->join("projects", "A.project_id", "=", "projects.id")
                ->selectRaw("(A.countA / (SELECT COUNT(id) FROM tasks B WHERE A.project_id = B.project_id)) * 100 as prog, A.project_id, projects.*")
                ->orderBy('prog', 'desc')->limit(5)->get(),
            'undoneTasks'=>Task::select('tasks.*', DB::raw('DATEDIFF(deadline, NOW()) as lateBy'))->whereIn('is_completed', ['in progress','not started'])->where('deadline','<=',$today)->orderBy('deadline', 'desc')->limit(5)->get()
        ]);
       

          


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
