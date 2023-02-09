<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/Project/create.css') }}">
</head>
<body>
    <x-sidebar />
    <div class="content">
        <a href="{{ url('projects') }}">
            <img src="/images/go-back-icon.svg" alt="arrow">
            Go Back
        </a>
        <div class="title">Create a New Project</div>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf
        </form>
    </div>
</body>
</html>
