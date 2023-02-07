<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
    </style>
        <link rel="stylesheet" href="{{ asset('assets/css/Task/show.css') }}">

</head>
<body>
    <div class="dashboardSide"></div>
    <div class="content">
        <h1>{{$task->title}}</h1>
      
            <ul>
                <li>{{$task->title}}</li>
                <li>{{$task->priority}}</li>
                <li>{{$task->is_completed}}</li>
                <li>{{$task->deadline}}</li>
                <li>{{$task->created_at}}</li>
                <li>{{$task->updated_at}}</li>
                <li>{{App\Models\Project::find($task->project_id)->title}}</li>
            </ul>
            <a href="{{route('tasks.edit',$task)}}">edit</a>
            <form action="{{route('tasks.destroy',$task)}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" name="" id="" value="delete">
            </form>
      
        
    </div>
</body>
</html>