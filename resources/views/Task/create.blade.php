<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      <div class="dashboardSide"></div>
    <div class="content">
        <form action="{{route('tasks.store')}}" method="POST">
            @csrf
            <label for="">Title <input type="text" name="title" id=""></label>
        <label for="">Priority 
            <select name="priority" id="">
                <option value="high">high</option>
                <option value="medium">medium</option>
                <option value="low">low</option>
            </select>
        </label>
        <label for=""> deadline <input type="datetime-local" name="deadline" id=""></label>
        <label for="">Project title 
            <select name="project_id" id="">
                @foreach ($pNames as $p)
                <option value="{{$p->id}}">{{$p->title}}</option>
                    
                @endforeach
            </select>
        </label>
        <input type="submit" name="" id="" value="add Task">
    </form>
    </div>
</body>
</html>