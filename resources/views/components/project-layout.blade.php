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
                <div class="progBar">
                    <div style="width:{{ round($progress) }}% ; background-color:#4a72ff ; height: 20px; ">
                    </div>
                    <div style="width:{{ round(100 - $progress) }}% ; background-color:#ddd ; height: 20px; ">
                    </div>
                </div>
            </div>
        </div>
        <a class="project-link" href="{{ route('projects.show', $id) }}">
            View Details</a>
    </div>
</body>

</html>
