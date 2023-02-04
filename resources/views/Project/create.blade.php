<head>
    <style>
        .content {
            margin-left: 348px;
            margin-top: 59px;
            display: flex;
            flex-direction: column;
        }

        .title {
            font-family: 'Rubik One';
            font-size: 40px;
            font-weight: 700;
            text-align: center;
            margin: auto;
        }

        .content>a {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Rubik';
            font-weight: 600;
            font-size: 20px;
            color: #4A72FF;
            cursor: pointer;
        }

        .content>a>img {
            height: 20px;
            width: auto;
        }
    </style>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <a href="{{ url('projects') }}">
            <img src="/images/go-back-icon.svg" alt="arrow">
            Go Back
        </a>
        <div class="title">Create a New Project</div>
        <form action="{{ route('Project.store') }}" method="post">
            @csrf
        </form>
    </div>
</body>
