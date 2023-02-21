<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/Components/deleteButton.css') }}"> --}}

</head>

<body>
    <form action="{{ route($route, $object) }}" method="POST">
        @csrf
        @method('delete')
        <button id="deleteBtn" type="submit" style="border: none ;     background-color: transparent ; cursor: pointer;"><img src="{{ asset('images/Vector.svg') }}" style="width: 20px ; height: 20px;" alt=""></button>
        {{-- <input type="submit" name=""  value="delete"> --}}
        {{-- <object data={{ asset('images/Vector.svg') }} width="20"
            height="20"> --}}
    </form>
</body>

</html>
