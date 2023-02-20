<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class Filter extends Controller
{
    public function Filter(Request $request)
    {
        $tasks = Task::all();
        if ($request->has('priority')) {
            $tasks = $tasks->where('priority', $request->priority);
            $tasks->toQuery();
        }
        if ($request->has('status')) {
            $tasks = $tasks->where('is_completed', '=', $request->status);
            $tasks->toQuery();
        }
        
        if ($request->date == 'asc') {
            $tasks = collect($tasks)->sortBy('deadline');
            return $tasks;
        } else {
            $tasks = collect($tasks)->sortByDesc('deadline');
            return $tasks;
        }

        
    }
}
