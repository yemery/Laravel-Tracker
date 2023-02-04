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
    <div class="dashboardBar">

    </div>
    <div class="Content">
       
        <table>
  <thead>
  <th>task name</th>
  <th>Priority</th>
  <th>Status</th>
  <th>startline</th>
  <th>deadline</th>
  <th>Task's project</th>
  <th>updated at</th>

  </thead>
  <tbody>
     @foreach ($tasks as $task)
        <tr>
            <td><a href="{{route('tasks.show',$task)}}">{{$task->title}}</a></td>
            <td>{{$task->priority}}</td>
            <td>{{$task->is_completed}}</td>
            <td>{{$task->created_at}}</td>
            <td>{{$task->deadline}}</td>
            <td></td>
            <td>{{$task->updated_at}}</td>
            
        </tr>
        @endforeach
 
  </tbody>
 
</table>
    </div>
</body>
</html>