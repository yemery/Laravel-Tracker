<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Project/edit.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="row">
            <x-go-back />
            <div class="title">Update The Project</div>
        </div>
        <form action="{{ route('projects.update', $project->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="input-div">
                <label>Project Title</label>
                <input type="text" name="title" value="{{ $project->title }}">
            </div>
            <input type="submit" value="Update The Project">
        </form>
    </div>
</body>

</html>
