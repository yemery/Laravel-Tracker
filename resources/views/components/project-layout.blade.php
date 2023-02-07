<head>
    <style>
        .project-container {
            background-color: white;
            border: solid 3px #4A72FF;
            border-radius: 15px;
            width: 345px;
            height: 197px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
        }

        .project-title {
            font-family: 'Rubik';
            font-weight: 700;
            font-size: 32px;
            text-align: center;
        }

        .project-link {
            color: #4A72FF;
            text-decoration-line: underline;
            font-size: 20px;
            font-family: 'Rubik';
            align-self: flex-end;
            margin-right: 5%;
            cursor: pointer;
        }


        .progress-bar {
            height: 15px;
            background-color: #D9D9D9;
        }

        .progress {
            height: 100%;
            width: 50%;
            background-color: #4A72FF;
        }

        .project-progression {
            display: flex;
            flex-direction: column;
            width: 90%;
            height: 52px;
            justify-content: space-between;
        }

        .project-status {
            display: flex;
            justify-content: space-between;
        }

        .message {
            font-family: 'Rubik';
            font-size: 24px;
        }

        .percentage {
            font-family: 'Rubik';
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="project-container">
        <p class="project-title">
            {{ $title }}
        </p>
        <div class="project-progression">
            <div class="project-status">
                <p class="message">In Progress</p>
                <p class="percentage">-%</p>
            </div>
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
        </div>
        <a class="project-link" href="{{ route('projects.show', $id) }}">
            View Details</a>
    </div>
</body>
