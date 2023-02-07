<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Task/create.css') }}">

    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
    </style>
</head>

<body>
    <x-sidebar />
    <a href="{{ URL::previous() }}" class="goBack"><object data={{ asset('images/goBack.svg') }} width="10"
            height="10"> </object>
        go back</a>

    <div class="content">
        <div class="formDiv">
            <h3>create new task</h3>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <label for="">Title</label>
                <input type="text" name="title" id="">
                <label for="">Priority

                </label>
                <select name="priority" id="">
                    <option value="high">high</option>
                    <option value="medium">medium</option>
                    <option value="low">low</option>
                </select>
                <label for=""> deadline </label>
                <input type="datetime-local" name="deadline" id="">
                <label for="">Project title

                </label>
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
