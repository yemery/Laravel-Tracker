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
     <x-sidebar />
    <a href="{{ URL::previous() }}" class="goBack"><object data={{ asset('images/goBack.svg') }} width="10"
            height="10"> </object>
        go back</a>

    <div class="content">

        {{-- <h3>{{$task->title}}</h3> --}}
        <h3>Details</h3>
      
            {{-- <ul>
                <li>{{$task->title}}</li>
                <li>{{$task->priority}}</li>
                <li>{{$task->is_completed}}</li>
                <li>{{$task->deadline}}</li>
                <li>{{$task->created_at}}</li>
                <li>{{$task->updated_at}}</li>
                <li>{{App\Models\Project::find($task->project_id)->title}}</li>
            </ul>
            <a href="{{route('tasks.edit',$task)}}">edit</a>
            <form action="{{route('tasks.desdivoy',$task)}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" name="" id="" value="delete">
            </form> --}}
<div class="divs">
            <div>
                <span>Title</span>
                <span>{{$task->title}}</span>
            </div>
            <div>
                <span>assigned to</span>
                <span>{{ App\Models\Project::find($task->project_id)->title }}</span>
            </div>
              <div>
                <span>Priority</span>
                <span>{{$task->priority}}</span>
            </div>
              <div>
                <span>status</span>
                <span>{{$task->is_completed}}</span>
            </div>
              <div>
                <span>startline</span>
                <span>{{$task->created_at}}</span>
            </div>
              <div>
                <span>deadline</span>
                <span>{{$task->deadline}}</span>
            </div>
             <div>
                <span >days left</span>
                <span style="color: rgb(248, 31, 31)">{{ \Carbon\Carbon::parse($task->deadline)->diffInDays(\Carbon\Carbon::parse($task->created_at))}} days</span>
            </div>
             <div>
                <span>updated at</span>
                <span>{{$task->updated_at}}</span>
            </div>
      
        </div>
           <div class="lastTd">
                               
                                <a href="{{ route('tasks.edit', $task) }}">
                                    <input type="button" value="edit"></a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" name="" id="" value="delete">
                                </form>
                            </div>
    </div>
</body>
</html>