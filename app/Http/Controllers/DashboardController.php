<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Dashboard;
use Illuminate\Support\Facades\DB;
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
        // dd(Task::orderBy('deadline', 'desc')->get());
        // dd(Task::where('is_completed','completed')->groupBy('project_id')->get());
        // dd(Task::select(
        //             DB::raw("(SELECT COUNT(id) as countA, project_id FROM `tasks` WHERE is_completed='completed' GROUP BY project_id) A"),
        //             DB::raw("(SELECT COUNT(id) as countB, project_id FROM `tasks`  GROUP BY project_id) B")),
        //             DB::raw("(A.countA / B.countB) *  100 AS result")
        //   ->where( "A.project_id","B.project_id")->get());
        //         dd(Task::select("SELECT (A.countA / B.countB) *  100 AS result , A.project_id,B.project_id
        // FROM   (SELECT COUNT(id) as countA, project_id FROM `tasks` WHERE is_completed='completed' GROUP BY project_id) A
        //       ,(SELECT COUNT(id) as countB, project_id FROM `tasks`  GROUP BY project_id) B
        //       WHERE  A.project_id=B.project_id;")->get());
        //     dd(Task::selectRaw("(A.countA / B.countB) * 100 as result, A.project_id, B.project_id")
        // ->fromSub(function ($query) {
        //     $query->selectRaw("COUNT(id) as countA, project_id")
        //           ->from("tasks")
        //           ->where("is_completed", "completed")
        //           ->groupBy("project_id");
        // }, "A")
        // ->joinSub(function ($query) {
        //     $query->selectRaw("COUNT(id) as countB, project_id")
        //           ->from("tasks")
        //           ->groupBy("project_id");
        // }, "B", "A.project_id", "=", "B.project_id")
        // ->get());



        // CHATGPT CONVERTE SQL QUERY TO THIS  ....OUR SAVIOR ....THANKS CHAT 
        //         dd( DB::table(DB::raw("(SELECT COUNT(id) as countA, project_id FROM tasks WHERE is_completed='completed' GROUP BY project_id) as A"))
        //             ->selectRaw("(A.countA / (SELECT COUNT(id) FROM tasks B WHERE A.project_id = B.project_id)) * 100 as result, A.project_id")
        //             ->get()
        // );
        // dd(DB::table(DB::raw("(SELECT COUNT(id) as countA, project_id FROM tasks WHERE is_completed='completed' GROUP BY project_id) as A"))
        //     ->join("projects", "A.project_id", "=", "projects.id")
        //     ->selectRaw("(A.countA / (SELECT COUNT(id) FROM tasks B WHERE A.project_id = B.project_id)) * 100 as prog, A.project_id, projects.*")
        //     ->orderBy('prog', 'desc')->limit(3)->get());

        return view('Dashboard.index', [
            'tasks' => Task::orderBy('deadline', 'desc')->limit(5)->get(),
            'progressions' => DB::table(DB::raw("(SELECT COUNT(id) as countA, project_id FROM tasks WHERE is_completed='completed' GROUP BY project_id) as A"))
                ->join("projects", "A.project_id", "=", "projects.id")
                ->selectRaw("(A.countA / (SELECT COUNT(id) FROM tasks B WHERE A.project_id = B.project_id)) * 100 as prog, A.project_id, projects.*")
                ->orderBy('prog', 'desc')->limit(3)->get()
        ]);
        // dd(  DB::table("tasks as A")
        // ->join("projects", "A.project_id", "=", "projects.id")
        // ->join("(SELECT COUNT(id) as countB, project_id FROM tasks  GROUP BY project_id) B", "A.project_id", "=", "B.project_id")
        // ->selectRaw("(COUNT(A.id) / B.countB) * 100 as result, A.project_id, projects.*")
        // ->where("A.is_completed", "=", "completed")
        // ->groupBy("A.project_id")
        // ->get()



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
