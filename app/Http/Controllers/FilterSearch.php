<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class FilterSearch extends Controller
{
    public function Filter(Request $request)
    {
         $tasks=Task::get();
        // // dd($tasks);
        // $filtredCollection=[];
       
        if ($request->has('priority')) {
            $tasks=$tasks->where('priority',$request->priority);
        }
        if ($request->has('status')) {
            $tasks=$tasks->where('is_completed','=',$request->status);
            // funckiiiiiiiiiiiiiiiiiiiiiiiiiiiing all() instead of get()
        }
         if ($request->has('date')) {
            // $tasks=$tasks->orderBy('deadline',$request->date)->all();
            // orderby doesnt work on arrays !!! damn 
            // from doc we can use sort and sortdesc on collection  that mean we gotta use if else 
            // sortby => asc sortDesc=> desc
            if ($request->date=='asc') {
                $tasks=collect($tasks)->sortBy('deadline');
            } else {
            $tasks=collect($tasks)->sortByDesc('deadline');

            }
            //   $tasks=$tasks->sortByDesc('deadline');

            // thanks stackoverflow 
            
            
        }

        // dd(count($tasks));
        // dd(count($tasks));
        return $tasks;
       
      
    }
    public function Search(Request $request,$collection)
    {
        // call this function if request had a search param
        // giving it the tasks that we got from the function above n return a new collection with that search
        // maymknch njibou tasks mn hna cus filter fun need an argument li howa request mn taskController
        // dd($request);

    }
    
}
