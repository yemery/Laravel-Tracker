<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class Filter extends Controller
{
    public function Filter(Request $request)
    {
        $tasks= new Task();
        if ($request->has('priority')) {
            $tasks = $tasks->where('priority', $request->priority);
            // $tasks->toQuery();
        }
        if ($request->has('status')) {
            $tasks = $tasks->where('is_completed', '=', $request->status);
            // $tasks->toQuery();
        }

        if ($request->date == 'asc') {
            $tasks = $tasks->orderBy('deadline','asc');
            // $tasks = $tasks->orderBy('deadline', 'asc')->get();
        } else {
            // $tasks = Task::sortByDesc('deadline');
            $tasks = $tasks->orderBy('deadline', 'desc');
        }

        if ($request->has('search')) {
            $tasks = $tasks->where('tasks.title', 'like', "%$request->search%");
        }
        return $tasks->join('projects', 'tasks.project_id', '=', 'projects.id')
            ->select('tasks.*', 'projects.title as project_title')
           ->orderBy('tasks.created_at','asc')
            // ->get()
          
            ;
    }
}
