<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Task/index.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
    <style>

    </style>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="header">
            <h3>all your tasks</h3>
        </div>
         <x-create-button href="tasks.create">create a new task</x-create-button>
        <div class="btns">
           
                <form method="POST">
                    <input type="text" name="searchText" id="" class="searchBar">
                    <input type="submit" name="" id="" value="search">
                </form>
          
          
              <form  method="GET">
                {{-- @csrf --}}
                <select name="date" id="" value='{{Request::get('date')}}'>
                    <option value="" disabled selected>by date</option>
                    <option value="asc" >date (asc)</option>
                    <option value="desc" >date (desc)</option>
                </select>
                
                  <select name="date" id="" value='{{Request::get('date')}}'>
                    <option value="" disabled selected>by priority</option>
                    <option value="asc" >date (asc)</option>
                    <option value="desc" >date (desc)</option>
                </select>
               
                  <select name="date" id="" value='{{Request::get('date')}}'>
                    <option value="" disabled selected>by Status</option>
                    <option value="asc" >date (asc)</option>
                    <option value="desc" >date (desc)</option>
                </select>
                
                <input type="submit" name="" id="" value="filter">
               
            </form>
             <a href="{{route('tasks.index')}}" style="font-size: 15px;
    background-color: red;
    color: white;
    width: 45px;
    text-align: center;
    height: 20px;
    border-radius: 1px;">clear</a>
          
        
     
           
        </div>
        <div class="tasksTable">
            <table>
                <thead>
                    <th>Task Title</th>
                    <th>Task Project</th>
                    <th>Deadline</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td><a href="{{ route('tasks.show',$task->id) }}">{{ $task->title }}</a></td>
                            <td><a href="{{ route('projects.show', $task->project_id) }}">
                                    {{$task->project_title}}</a></td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->priority }}</td>
                            <td>{{ $task->is_completed }}</td>
                            <td class="lastTd">
                                <x-edit-button href='tasks.edit' :id='$task'>
                                    <p>edit</p>
                                </x-edit-button>
                                <x-delete-button route="tasks.destroy" :object='$task' />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $tasks->links() }}
    </div>
</body>

</html>
