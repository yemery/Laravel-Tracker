<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Settings/index.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="main">
            <div class="personal-information">
                <div class="title">Personal Information</div>
                <div class="userData">
                    <p>User Id : {{ $user->id }}</p>
                    <p>First Name : {{ $user->first_name }}</p>
                    <p>Last Name : {{ $user->last_name }}</p>
                    <p>Email Address : {{ $user->email }}</p>
                    <p>Password : {{ $password }}</p>
                </div>
            </div>
            <div class="email-verification">
                <div class="title">Email Notifications</div>
                <div class="notifications">
                    <p>Deadline Alerts</p>
                    <p>Project Completion</p>
                </div>
            </div>
        </div>
        <div class="buttons">
            <a href="{{route('settings.edit', $user)}}" class="modify-btn">Modify</a>
            <button class="logout">Log Out</button>
        </div>
    </div>
</body>

</html>
