<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$task->id}}</h1>
      <form action="{{route('tasks.update',$task->id)}}" method="POST">
        
            @csrf
            @method('PATCH')            
            <label for="">Title <input type="text" name="title" id="" value="{{$task->title}}"></label>
        <label for="">Priority 
             <select name="priority" id="">
          
                <option value="high" @selected(old('priority','high') == $task->priority) >high</option>
                <option value="medium" @selected(old('priority','medium') == $task->priority) >medium</option>
                <option value="low" @selected(old('priority','low') == $task->priority)>low</option>
                        
                
            </select>
        </label>
        <label for=""> deadline <input type="datetime-local" name="deadline" id="" value="{{$task->deadline}}"></label>
        <label for="">Project title 
            <select name="project_id" id="">
                @foreach ($pNames as $p)
                
               
                <option value="{{$p->id}}" @selected(old('project_id',$p->id) == $task->project_id)>{{$p->title}}</option>
            
                    
                @endforeach
            </select>
        </label>
        <label for="">Status :
            
           
             <label for=""><input type="radio" name="is_completed" id="" value="not started"  @checked(old('is_completed', 'not started')== $task->is_completed)  >not started yet </label> 
            <label for=""> <input type="radio" name="is_completed" id="" value="in progress" @checked(old('is_completed', 'in progress')== $task->is_completed) >in progress</label> 
            <label for=""> <input type="radio" name="is_completed" id="" value="completed" @checked(old('is_completed', 'completed')== $task->is_completed) >completed</label> 
           
        
        </label>
        <input type="submit" name="" id="" value="Edit Task">
    </form>
</body>
</html>