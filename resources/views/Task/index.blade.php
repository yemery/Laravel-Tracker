<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Task/index.css') }}">
    <title>Document</title>
</head>
<body>
    {{-- <div class="sideBar"> --}}
            <x-sidebar />
    {{-- </div> --}}
    <div class="content">
        <div class="header">
            <h3>all your tasks</h3>
        </div>
       <div class="btns">
        <select name="sortby" id="">
            <option value="" disabled selected>Sort by</option>
             <optgroup label="date">
             <option value="">date (asc)</option>
            <option value="">date (desc)</option>
                       
            </optgroup>
           
            <optgroup label="Priority">
            
                       <option value="">priority (hight to low)</option>
            <option value="">priority (low to high)</option>
            </optgroup>
         
  <optgroup label="status">
            
                       <option value="">not started yet</option>
            <option value="">done</option>
            <option value="">in progress</option>
            </optgroup>
         
        </select>
        <a href="{{route('tasks.create')}}">create new task</a>
       </div>
       <div class="tasksTable">
         <table>
  <thead>
  <th>task name</th>
    <th>Task's project</th>
  <th>startline</th>
  <th>deadline</th>

  <th>Priority</th>
  <th>Status</th>
  <th>updated at</th>
  <th>actions</th>

  </thead>
  <tbody>
     @foreach ($tasks as $task)
        <tr>
            <td><a href="{{route('tasks.show',$task)}}">{{$task->title}}</a></td>
            <td><a href="{{route('projects.show',$task->project_id)}}"> {{App\Models\Project::find($task->project_id)->title}}</a></td>
            <td>{{$task->created_at}}</td>
            <td>{{$task->deadline}}</td>

            <td>{{$task->priority}}</td>
            <td>{{$task->is_completed}}</td>
            <td>{{$task->updated_at}}</td>
            <td class="lastTd"> 
                <a href="{{route('tasks.edit',$task)}}"><input type="button" value="edit"></a>
 <form action="{{route('tasks.destroy',$task)}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" name="" id="" value="delete">
            </form>               
            </td>
            
        </tr>
        @endforeach
 
  </tbody>
 
</table>
       </div>
    </div>
</body>
</html>