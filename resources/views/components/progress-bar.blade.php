<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/Components/progressBar.css') }}">
</head>

<body>
    <div class="progBar">
        <div class="fill" style="width:{{ round($prog) }}%;">
        </div>
        <div class="empty" style="width:{{ round(100 - $prog) }}%;">
        </div>
    </div>
</body>

</html>
