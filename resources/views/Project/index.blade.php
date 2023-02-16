<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Project/index.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="title">Your Projects</div>
        <div class="button">
            <x-create-button id="creation-btn" href="projects.create">Create A New Project</x-create-button>
        </div>
        <div class="projects-listing">
            @foreach ($projects as $project)
                {{ $prog = null }}
                @foreach ($progressions as $id => $progression)
                    @if ($id == $project->id)
                        <x-project-layout :title="$project->title" :id="$project->id" :progress="$progression" />
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="pagination">
            {{ $projects->links() }}
        </div>
    </div>

</body>

</html>
