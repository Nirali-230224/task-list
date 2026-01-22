<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css?ver=1.2') }}">

</head>
<body>        
    <div class="content">
        <div class="contentsection">

        @foreach($tasks as $task)
        <input type = "hidden" value = "{{ $task->taskstatus }}" id="statushidden">
            <div class="taskcontent">
                <h1 class="tasktitle">{{ $task->taskname }}</h1>
                <span class="backbtn"><i class="fas fa-arrow-left"></i>Go back to the task list</span>
                <p class="taskdata">{{ $task->short_description }}</p>
            </div>
            <div class="tdate">
                <span class="taskdate">{{ $task->long_description }}</span>
            </div>
            <div class="minutesago">
                <ul>
                    <li class="minutesago">Created 20 minutes ago</li>
                    <li class="minutesago">Updated 20 minutes ago</li>
                </ul>
            </div>
            
                <div class="stat">
                    <span class="tstst" id="taskpending">{{ $task->taskstatus }}</span>
                </div>
           
            
        @endforeach

        <div class="buttons">
            @if($task->taskstatus == 'pending')
                <span class = "buttonbtn"><a href="{{ url('/edittask', $task->taskid) }}">Edit</a></span>
                <span class="buttonbtn" id="markbutton"><a href="{{ url('/completed', $task->taskid) }}">Mark as completed</a></span>
            @endif
            <span class="buttonbtn"><a href="{{ url('/deletetask', $task->taskid) }}">Delete</a></span>
        </div>

</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/task.js?ver=1.4') }}"></script>
</html>