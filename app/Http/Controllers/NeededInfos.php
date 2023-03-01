<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
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
        $this->tasks=$projects->join('tasks','tasks.project_id','projects.id');
        return $this->tasks;
    }
    


}
