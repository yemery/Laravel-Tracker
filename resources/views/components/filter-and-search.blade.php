<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <link rel="stylesheet" href="{{ asset('assets/css/Components/filter.css') }}">

</head>
<body>
      <div class="btns">
           
                <form method="GET">
                    <input type="text" name="search" id="" placeholder="Search for A Task Title" class="searchBar">
                    <input type="submit" name="" id="" value="search">
                </form>
          
          
              <form  method="GET">
                {{-- @csrf --}}
                <select name="date" id="" value='{{Request::get('date')}}'>
                    <option value="" disabled selected>by date</option>
                    <option value="asc" >date (asc)</option>
                    <option value="desc" >date (desc)</option>
                </select>
                
                  <select name="priority" id="" value='{{Request::get('priority')}}'>
                    <option value="" disabled selected>by priority</option>
                    <option value="high" >high</option>
                    <option value="medium" >medium</option>
                    <option value="low" >low</option>
                </select>
               
                  <select name="status" id="" value='{{Request::get('status')}}'>
                    <option value="" disabled selected>by Status</option>
                    <option value="in progress" >in progress</option>
                    <option value="not started" >not started yet</option>
                    <option value="completed" >completed</option>
                </select>
                
                <input type="submit" name="" id="" value="filter">
               
            </form>
             <a href="{{route('tasks.index')}}" style="font-size: 15px;
    background-color: red;
    color: white;
    width: 45px;
    text-align: center;
    height: 20px;
    border-radius: 1px;">clear</a>
          
        
     
           
        </div>
</body>
</html>