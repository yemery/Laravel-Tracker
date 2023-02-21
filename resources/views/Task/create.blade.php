<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Task/create.css') }}">
    <link rel="icon" href="/images/project-tracker-logo.svg" type="image/x-icon">
    <title>Project Tracker</title>
</head>

<body>
    <x-sidebar />
    <x-go-back />

    <div class="content">
        <div class="formDiv">
            <h3>create new task</h3>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <label for="">Title</label>
                <input type="text" name="title" id="">

                <label for="">Priority</label>
                <select name="priority" id="">
                    <option value="high">high</option>
                    <option value="medium">medium</option>
                    <option value="low">low</option>
                </select>

                <label for=""> deadline </label>
                <input type="date" name="myDate" min="{{ date('Y-m-d') }}">

                <label for="">Project title</label>
                <select name="project_id" id="">
                    @foreach ($pNames as $p)
                        <option value="{{ $p->id }}">{{ $p->title }}</option>
                    @endforeach
                </select>

                <input type="submit" name="" id="" value="add Task">
            </form>
        </div>
    </div>
</body>

</html>
