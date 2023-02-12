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

    

{{-- {{ foreach ($combined as $key => $value) {
     echo "$key is $value\n";
}
dd($combined)}} --}}

    {{-- @foreach ($progressions as $progression)
        {{dd($progression)}}
    @endforeach --}}

<body>
    <x-sidebar />
    <div class="content">
        <div class="title">Your Projects</div>
        <a id="creation-btn" href="{{ route('projects.create') }}">Create A New Project</a>
        <div class="projects-listing">
            @foreach ($projects as $project)
                <x-project-layout
                :title="$project->title"
                :id="$project->id"
                {{-- :progress =
                @foreach ($progressions as $progression)
                
                    @if ($progression->project_id == $project->id)
                        {{$progression->prog}}
                    @endif
                    {{-- @if (!in_array($progression, array_values($project)))
                        {{ 0 }}
                    @endif
                    @endforeach --}}
            />
            @endforeach
        </div>
        <div class="pagination">
            {{ $projects->links() }}
        </div>
    </div>

</body>

</html>
