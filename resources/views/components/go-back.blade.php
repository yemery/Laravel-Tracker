<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/Components/goBack.css') }}">
</head>
<body>
    <a href="{{ URL::previous() }}" class="goBack" style="filter: invert(34%) sepia(60%) saturate(2648%) hue-rotate(219deg) brightness(106%) contrast(101%); font-weight: 700"><object data={{ asset('images/goBack.svg') }} width="10"
            height="10" ></object>
        go back </a>
</body>
</html>