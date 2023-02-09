<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Project/index.css') }}">
    <title>Document</title>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="title">Your Projects</div>
        <div class="row">
            <p>Overview</p>
            <x-button id="creation-btn">Create A New Project</x-button>
        </div>
        <div class="projects-listing">
            @foreach ($projects as $project)
                <x-project-layout :title="$project->title" :id="$project->id" />
            @endforeach
        </div>
    </div>
</body>

</html>
