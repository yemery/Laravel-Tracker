<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Settings/edit.css') }}">
    <title>Document</title>
</head>

<body>
    <x-sidebar />
    <div class="content">
        <div class="row">
            <a href="{{ URL::previous() }}">
                <img src="/images/go-back-icon.svg" alt="arrow">
                Go Back
            </a>
        </div>
        <form action="
        {{-- {{ route('settings.update', $user->id) }} --}}
        " method="post">
            @csrf
            @method('PATCH')
            <div class="inputs">
                <div>
                    <div class="input-div">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}">
                    </div>
                    <div class="input-div">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}">
                    </div>
                </div>
                <div>
                    <div class="input-div">
                        <label>Old Password</label>
                        <input type="password" name="old_password">
                    </div>
                    <div class="input-div">
                        <label>New Password</label>
                        <input type="password" name="password">
                    </div>
                    <div class="input-div">
                        <label>Confirm New Password</label>
                        <input type="password" name="confirm_password">
                    </div>
                </div>
            </div>
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>
