<head>
    <style>
        .content {
            position: absolute;
            right: 0;
            margin-left: 348px;
            margin-top: 59px;
            display: flex;
            flex-direction: column;
        }

        .title {
            font-family: 'Rubik One';
            font-size: 32px;
            color: #4A72FF;
            text-align: center;
            margin: auto;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin: 2% 5%;
        }

        .row>p {
            font-family: 'Rubik One';
            font-size: 25px;
            font-style: normal;
            color: #4A72FF;
        }

        .projects-listing {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-left: 5%;
            row-gap: 25px;
        }
    </style>
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
