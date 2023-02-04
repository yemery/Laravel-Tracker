<head>
    <style>
        .content {
            margin-left: 348px;
            margin-top: 59px;
            display: flex;
            flex-direction: column;
        }

        .go-back {
            display:flex;
            color: #4A72FF;
            font-weight: 600;
            font-size: 24px;
            font-family: 'Rubik';
        }
    </style>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <a class="go-back" href="{{ URL::previous() }}">
            <img src="images/go-back-icon.svg" alt="go-back-icon">
            Go Back
        </a>
        {{ dd($project->id) }}
    </div>
</body>
