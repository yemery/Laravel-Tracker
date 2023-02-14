<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Project/project-layout.css') }}">
</head>

<body>
    <div class="project-container">
        <p class="project-title">
            {{ $title }}
        </p>
        <div class="project-progression">
            <div class="project-status">
                <p class="message">Progress</p>
                <p class="percentage">{{ $progress . ' %' }}</p>
            </div>
            <div class="progress-bar">
               <x-progress-bar :prog='$progress'/>
            </div>
        </div>
        {{-- <a class="project-link" href="{{ route('projects.show', $id) }}">
            View Details</a> --}}
        <x-button href='projects.show' :object='$id'>View Details</x-button>    </div>
</body>

</html>
