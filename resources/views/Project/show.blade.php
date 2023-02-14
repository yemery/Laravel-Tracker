<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Project/show.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="row">
                      <x-go-back/>

            <div class="title">{{ $project->title }}</div>
        </div>
        <div class="buttons-div">
            <button>Filter</button>
                        <x-button href='tasks.create'>Add A New Task</x-button>

            {{-- <a href="{{route('tasks.create')}}">Add A New Task</a> --}}
                                                        <x-button href='projects.edit' :object='$project->id'>Edit The Project</x-button>

            {{-- <a href="{{route('projects.edit', $project->id)}}">Edit The Project</a> --}}
        </div>
        <table>
            <thead>
                <th>Task Title</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>
                                                        <x-button href='tasks.show' :object='$task->id'>{{ $task->title }}</x-button>

                            {{-- <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td> --}}
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->is_completed }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td class="lastTd">
                            <x-button href='tasks.edit' :object='$task'>edit</x-button>

                         
                                <x-delete-button route="tasks.destroy" :object='$task' />
                            {{-- <a href="{{ route('tasks.edit', $task) }}"><input type="button" value="Edit"></a> --}}
                            {{-- <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" name="" id="" value="Delete">
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                                        <x-delete-button route="projects.destroy" :object='$project' />

        <div class="footer">
            {{ $tasks->links() }}
        </div>
        
        {{-- <form action="{{ route('projects.destroy', $project) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" name="" id="delete-btn" value="Delete The Project">
        </form> --}}
    </div>
</body>

</html>
