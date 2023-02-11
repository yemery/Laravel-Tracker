<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <link rel="stylesheet" href="{{ asset('assets/css/Dashboard/index.css') }}">

</head>
<body>
        <x-sidebar/>
        <div class="content">
            <h3>Hello , User Name</h3>
            <i>welcome back !</i>
            <div class="deadlines">
                <h4>upcoming deadlines</h4>
                <div class="tasksTable">
                <table>
                    <thead>
                        <th>task title</th>
                        <th>deadline</th>
                        <th>days left</th>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task->title}}</td>
                        <td>{{$task->deadline}}</td>
                        <td>{{ \Carbon\Carbon::parse($task->deadline)->diffInDays(\Carbon\Carbon::parse($task->created_at))}} days</td>
                    </tr>
                        
                    @endforeach
                </tbody>
                </table>
                   

            </div>
            </div>
            <div class="completedProject">
                <h4>Almost Completed Projects</h4>
                <div class="projectsTable">
                    <table>
                        <thead>
                            <th>project title</th>
                            <th>progress</th>
                            <th>remaining percentage</th>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
        

</body>
</html>