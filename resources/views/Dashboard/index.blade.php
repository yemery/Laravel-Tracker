<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Dashboard/index.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
</head>

<body>
    <x-sidebar />
    <div class="content">
      <div class="header">  <h3>Hello , {{$userName}}</h3>
        <i>welcome back !</i></div>
        <div class="tables">
                    <div class="deadlines">
            <h4>upcoming deadlines</h4>
            @if (count($tasks) == 0)
                <h3>all your tasks are completed</h3>
            @else
                  {{-- <div class="tasksTable"> --}}
                <table>
                    <thead>
                        <th>task title</th>
                        <th>deadline</th>
                        <th>days left</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                {{-- <td>{{ $task->title }}</td> --}}
                                <td><x-show-btn href='tasks.show' :object='$task->id'>{{$task->title}}</x-show-btn></td>
                                <td>{{ $task->deadline }}</td>
                                <td>{{ $task->daysLeft }}
                                    days</td>
                            </tr>
                        @endforeach
                        {{-- {{ $tasks->links() }} --}}
                    </tbody>
                </table>
     

            {{-- </div> --}}
            @endif
     
        </div>
        <div class="completedProject">
            <h4>Almost Completed Projects</h4>
            {{-- <div class="projectsTable"> --}}
                <table>
                    <thead>
                        <th>project title</th>
                        <th>progress</th>
                    </thead>
                    <tbody>
                        @foreach ($progressions as $progression)
                            <tr>
                                <td class="titleCell"><x-show-btn href='projects.show' :object='$progression->project_id'>{{ $progression->title }} </x-show-btn></td>
                                <td class="progContainer">
                                    <x-progress-bar :prog='$progression->prog' />
                                    {{ intval($progression->prog) }} %
                                </td>
                            </tr>
                        @endforeach 
                          {{-- {{ $progressions->links() }} --}}
                    </tbody>

                </table>
               
            {{-- </div> --}}
             </div>
              <div class="lateTasks">
            <h4>undone tasks </h4>
            {{-- <div class="projectsTable"> --}}
                <table>
                    <thead>
                        <th>task title</th>
                        <th>deadline</th>
                        <th>late by</th>
                    </thead>
                    <tbody>
                        @foreach ($undoneTasks as $task)
                            <tr>
                                <td><x-show-btn href='tasks.show' :object='$task->id'>{{ $task->title }}</x-show-btn></td>
                             
                                <td>{{$task->deadline}}</td>
                                <td>{{$task->lateBy}} days</td>
                            </tr>
                        @endforeach  
                        {{-- {{ $undoneTasks->links() }} --}}
                    </tbody>

                </table>
              
            {{-- </div> --}}
             </div>
        </div>
       
    </div>


</body>

</html>
