<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class FilterAndSearch extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tasks=Task::get();
        dd($tasks);
    }
}
