<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/Components/editButton.css') }}"> --}}

</head>

<body>
    <a id="editBtn" href="{{ route($href, $id) }}" ><img src="{{ asset('images/Vector2.svg') }}" style="width: 20px ; height: 20px;" alt=""></a>
    {{-- <button><object data={{ asset('images/Vector2.svg') }} width="20"
            height="20"></button> --}}
</body>

</html>
