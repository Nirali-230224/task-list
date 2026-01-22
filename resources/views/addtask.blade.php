<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css?ver=1.1') }}">
    <title>{{ $tasks ? 'Update Task' : 'Add task' }}</title>
</head>
<body>
  
    <div class="section">
        <div class="addtaskform">
            <h1 class="formtitle">{{ $tasks ? 'Update your task here' : 'Add your task here' }}</h1>

            <form action="{{$tasks ? url('/updatetask', $tasks->taskid) : url('/submittask') }}" method="post">
                    @csrf 
                    <div class="tasknamerow">
                        <label for="taskname" class="taskname">Task Name</label><br/>
                        <input type="text" name="taskname" id="taskname" value="{{ $tasks ? $tasks->taskname : '' }}" required>
                    </div>

                    <label for="taskdetails" class="tdetails">Short Description</label>
                    <div class="detailsrow">
                        <textarea name="short_description" id="tshortdetails" rows="10" required>{{ $tasks ? $tasks->short_description : '' }}</textarea>
                    </div>

                    <label for="taskdetails" class="tdetails">Long Description</label>
                    <div class="detailsrow">
                        <textarea name="long_description" id="taskdetails" rows="10" required>{{ $tasks ? $tasks->long_description : '' }}</textarea>
                    </div>
                    
                    <div class="submitbtnrow">
                        <button type="submit">{{ $tasks ? 'Update' : 'Save' }}</button>
                        <button class="backbtn">Back</buttom>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>