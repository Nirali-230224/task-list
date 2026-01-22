<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css?ver=1.3') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
    <div class="content">
        <div class="contentsection">
            <h1 class="projecttitle">The list of tasks</h1>
            @if(session('success'))
                <div id="success-message" style="color: green; padding: 10px; border: 1px solid green;">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="addnewbutton"><a href="{{ url('add-task') }}">
            Add Task</a></h1>

            <table class="tasktable" cellpadding="10">
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="tablebody">
                            @if($task->taskstatus == 'completed')
                                <td class="listname" id="cssonlist"><a href="{{ url('viewtask', $task->taskid) }}" id="rowlist">{{ $task->taskname }}</a></td>
                            @else
                                <td class="listname"><a href="{{ url('viewtask', $task->taskid) }}" id="rowlist">{{ $task->taskname }}</a></td>
                            @endif
                            <!--<td>{{$task->taskstatus}}</td>
                            <td><a href="{{ url('edittask', $task->taskid) }}"><i class="fas fa-edit"></i></a></td>
                            <form action="{{ url('deletetask', $task->taskid) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <td><button type="submit" onclick="return confirm('Delete this task?')">Delete</button></td>
                            </form>
                            <td><a href="{{ url('viewtask', $task->taskid) }}"><i class="fa fa-eye"></i></td>-->
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/task.js?ver=1.3') }}"></script>
</html>