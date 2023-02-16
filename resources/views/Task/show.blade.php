<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets/css/Task/show.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
</head>

<body>
    <x-sidebar />
    <x-go-back />

    <div class="content">
        <h3>Details</h3>
        <div class="divs">
            <div>
                <span>Title</span>
                <span>{{ $task->title }}</span>
            </div>
            <div>
                <span>assigned to</span>
                <span>{{$task->project_title}}</span>
            </div>
            <div>
                <span>Priority</span>
                <span>{{ $task->priority }}</span>
            </div>
            <div>
                <span>status</span>
                <span>{{ $task->is_completed }}</span>
            </div>
            <div>
                <span>startline</span>
                <span>{{ $task->created_at }}</span>
            </div>
            <div>
                <span>deadline</span>
                <span>{{ $task->deadline }}</span>
            </div>
            <div>
                @if ($task->days_left >0)
                    <span>days left</span>
                
                @else
                <span>late by</span>
                
                    
                @endif
                <span
                    style="color: rgb(248, 31, 31)">{{$task->days_left}}
                    days</span>
            </div>
            <div>
                <span>updated at</span>
                <span>{{ $task->updated_at }}</span>
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
