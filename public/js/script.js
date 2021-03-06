function hideMenu(){
    document.getElementById('hiddenMenu').className = "hiddenMenu";
}

function showMenu(){
    document.getElementById("hiddenMenu").className = "hiddenMenu active";
}

function validate(job){
   return confirm('Weet u zeker dat u deze '+job+' wilt verwijderen?');
}

function moveMessageBox(typeOfBox) {
    $('.'+typeOfBox).animate({marginLeft: '100px', marginRight: '-100px'}, 200);
    $('.'+typeOfBox).animate({marginLeft: '0px', marginRight: '0px'}, 200);
    $('.'+typeOfBox).animate({marginLeft: '100px', marginRight: '-100px'}, 200);
    $('.'+typeOfBox).animate({marginLeft: '0px', marginRight: '0px'}, 200);
}

function toggleFeedbackBox(typeOfBox){
    $('.'+typeOfBox).delay('4000').slideUp('4000');
}


$("document").ready(function(){
    // MESSAGEBOXES
    moveMessageBox('alert-danger');
    toggleFeedbackBox('alert-success');

    // MAIN SCREEN
    if (readCookie('showScreen') != "true") {
        document.getElementById("navbar").style.display = 'none';
        $("#screen").click(function () {
            $(this).animate({marginTop: '-1000%'}, 2000);
            createCookie("showScreen", true, 1);
            setTimeout(function(){
                document.getElementById("navbar").style.display = 'block';
            }, 1000);
        });
    }
    else{
        document.getElementById("screen").style.display = 'none';
        document.getElementById("navbar").style.display = 'block';
    }

    // CREATE LIST
    $('#create_button').click(function(e){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var list_name = $('#list_name').val();
        var user_id = $('#user_id').val();
        e.preventDefault();
        $.ajax({
          url: '/tasklist/create',
            data: {list_name: list_name, user_id: user_id , _token: CSRF_TOKEN},
            dataType: 'text',
            type: 'GET',
            success: function (data) {
                $("#taskListsList").load('tasklist/lists/load');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

    // CREATE TASK
    $('#create_task_button').click(function(e){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var task_name = $('#task_name').val();
        var user_id = $('#user_id').val();
        var list_id = $('#list_id').val();
        var task_description = $('#task_description').val();
        e.preventDefault();
        $.ajax({
            url: '/task',
            data: {task_name: task_name, user_id: user_id , list_id: list_id, task_description: task_description, _token: CSRF_TOKEN},
            dataType: 'text',
            type: 'POST',
            success: function (data) {
                $("#taskList").load('/task/lists/'+list_id);
            },
            error: function (data) {
                alert('error');
            }
        });
    });

});
