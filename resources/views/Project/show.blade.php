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
            <x-go-back />
            <div class="title">{{ $project->title }}</div>
        </div>
        <div class="buttons-div">
            <button>Filter</button>
            <x-create-button href="tasks.create">Add A New Task</x-create-button>
            <x-edit-button href='projects.edit' :id='$project->id'>Edit The Project</x-edit-button>
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
                        <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->is_completed }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td class="lastTd">
                            <x-edit-button href='projects.edit' :id='$project->id'>
                                <p>edit</p>
                            </x-edit-button>
                            <x-delete-button route="tasks.destroy" :object='$task' />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            {{ $tasks->links() }}
        </div>
        <form action="{{ route('projects.destroy', $project) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" name="" id="delete-btn" value="Delete The Project">
        </form>
    </div>
</body>

</html>
