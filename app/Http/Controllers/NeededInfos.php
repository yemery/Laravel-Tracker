<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NeededInfos extends Controller
{
    public $user;
    public $projects;
    public $tasks;
    public function getUserInfo()
    {
        $this->user = Auth::user();
        return $this->user;
    }
     public function getUserProjects()
    {
        $this->projects=Project::where('projects.user_id',$this->getUserInfo()->id);
        return $this->projects;
    }
     public function getUserTasks()
    {

        $projects=$this->getUserProjects();
        $projects_id=$projects->pluck('id');
        $this->tasks=$projects->join('tasks','tasks.project_id','projects.id');
        return $this->tasks;
    }
    
public function progression()
    {
        $user_tasks= $this->getUserTasks();
        $user_projects = $this->getUserProjects();

        $project_ids = [];
        $idsQuery = $user_projects->select('id')->get();

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
