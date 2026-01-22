$(document).ready(function(){
    $tstatus = $("#statushidden").val();

    if($tstatus == 'completed'){
        $("#taskpending").attr('id','taskcompleted');
    }
    else{
        $("#taskpending").attr('id','taskpending');
    }

     setTimeout(function() {
        $('#success-message').fadeOut('slow');
    }, 3000); // 3 seconds
    
});

$(".backbtn").on('click', function(){
    window.location.href = "/laravel/task-list/public/";
});

$("#markbutton").on('click', function(){
    $("#taskpending").attr('id','taskcompleted');
});