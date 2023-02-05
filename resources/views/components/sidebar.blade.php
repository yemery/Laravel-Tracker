<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
           display: flex;
    flex-direction: column;
    position: fixed;
    /* top: 50%; */
    /* transform: translateY(-50%); */
    justify-content: space-around;
    height: 100vh;
    background-color: white;
    width: 327px;
        }

        .container>img {
            margin-left: 5%;
            width: 227px;
            height: 79px;
            left: 50px;
            top: 44px;
        }

        ul {
            list-style-type: none;
            width: 327px;
            height: 426px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        li {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            /* width: 327px; */
            height: 63px;
            padding-left: 5%;
        }

        li a:hover {
            color: #4A72FF
        }

        li img {
            margin-right: 5%;
        }

        a {
            text-decoration: none;
            font-size: 28px;
            color: black;
            font-family: 'Rubik';
        }

        .active {
            color: #4A72FF;
        }

        li:has(> a.active) {
            background-color: #E8EDFF;
            border-right: 8px solid #4A72FF;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/project-tracker-logo.svg') }}" alt="project-tracker-logo">
        <ul>
            <li>
                <img src="{{ request()->is('dashboard') ? '/images/dashboard-active.svg' : '/images/dashboard.svg' }}"
                    alt="dashboard-icon">
                <a href="{{ url('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
            </li>
            <li>
                <img src="{{ request()->is('projects') ? '/images/projects-active.svg' : '/images/projects.svg' }}"
                    alt="projects-icon">
                <a href="{{ url('projects') }}" class="{{ request()->is('projects') ? 'active' : '' }}">Projects</a>
            </li>
            <li>
                <img src="{{ request()->is('tasks') ? '/images/tasks-active.svg' : '/images/tasks.svg' }}"
                    alt="tasks-icon">
                <a href="{{ url('tasks') }}" class="{{ request()->is('tasks') ? 'active' : '' }}">Tasks</a>
            </li>
            <li>
                <img src="{{ request()->is('settings') ? '/images/settings-active.svg' : '/images/settings.svg' }}"
                    alt="settings-icon">
                <a href="{{ url('settings') }}" class="{{ request()->is('settings') ? 'active' : '' }}">Settings</a>
            </li>
        </ul>
    </div>
</body>
