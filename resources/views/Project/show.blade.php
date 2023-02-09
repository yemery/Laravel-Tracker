<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Project/show.css') }}">
    <title>Document</title>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="row">
            <a class="go-back" href="{{ URL::previous() }}">
                <img src="/images/go-back-icon.svg" alt="go-back-icon">
                Go Back
            </a>
            <div class="title">{{ $project->title }}</div>
        </div>
        <div class="buttons-div">
            <x-button>Filter</x-button>
            <x-button>Add A New Task</x-button>
            <x-button>Edit The Project</x-button>
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
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->is_completed }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td class="lastTd">
                            <a href="{{ route('tasks.edit', $task) }}"><input type="button" value="edit"></a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" name="" id="" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('projects.destroy', $project) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" name="" id="delete-btn" value="Delete The Project">
        </form>
    </div>
</body>

</html>
