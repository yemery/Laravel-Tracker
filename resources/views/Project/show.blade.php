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
            <div class="title">            <x-show-btn href='projects.show' :object='$project->id'> {{ $project->title }}</x-show-btn>
</div>
        </div>
             <x-filter-and-search/>

       @if (count($tasks) == 0)
           <h1>0 tasks for this project</h1>
       @else
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
                            <x-show-btn href='tasks.show' :object='$task->id'>{{ $task->title }}</x-show-btn></a></td>
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
       @endif
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
