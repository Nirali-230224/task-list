<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css?ver=1.0') }}">
    <title>Task Manager - Edit Task</title>
</head>
<body>
    <header>
        <div class="header">
            <h1 class="headtitle">Task lists</h1>
        </div>
    </header>
    <div class="section">
        <div class="addtaskform">
            <h1 class="formtitle">Add your task here</h1>
                <form action="{{url('/submittask')}}" method="post">
                    @csrf 
                    <div class="tasknamerow">
                        <label for="taskname">Task Name</label>
                        <input type="text" name="taskname" id="taskname">
                    </div>
                        <label for="taskdetails" class="tdetails">Description</label>

                    <div class="detailsrow">
                        <textarea name="taskdetails" id="taskdetails" rows="10"></textarea>
                    </div>
                    <div class="daterow">
                        <label for="taskdate">Date</label>
                        <input type="date" name="taskdate" id="taskdate">
                    </div>
                    <div class="submitbtnrow">
                        <input type="submit" value="Save">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>