<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Components/createButton.css') }}">
</head>
<body>
    <a class="createBtn" href="{{ route($href) }}">{{ $slot }}</a>
</body>
</html>