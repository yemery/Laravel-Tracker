<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');

        .content {
            margin-left: 348px;
            margin-top: 59px;
            display: flex;
            flex-direction: column;
        }

        .go-back {
            display: flex;
            color: #4A72FF;
            font-weight: 600;
            font-size: 24px;
            font-family: 'Rubik';
        }

        .go-back>img {
            width: 1.75%;
            height: auto;
            margin-right: 1%;
        }

        .title {
            font-family: 'Rubik One';
            font-size: 24px;
            text-align: center;
            margin: 2% auto;
            font-weight: 700;
        }

        .buttons-div {
            display: flex;
            justify-content: space-around;
            gap: 256px;
        }

        thead {
            font-family: 'Rubik';
            font-weight: 600;
            color: #4A72FF;
        }
    </style>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <a class="go-back" href="{{ URL::previous() }}">
            <img src="/images/go-back-icon.svg" alt="go-back-icon">
            Go Back
        </a>
        <div class="title">{{ $project->title }}</div>
        <div class="buttons-div">
            <x-button>Filter</x-button>
            <x-button>Add A New Task</x-button>
        </div>
        <table>
            <thead>
                <th>Task Title</th>
                <th>Creation Date</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->is_completed }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td>-</td>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
