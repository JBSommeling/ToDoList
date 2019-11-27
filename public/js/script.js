function hideMenu(){
    document.getElementById('hiddenMenu').className = "hiddenMenu";
}

function showMenu(){
    document.getElementById("hiddenMenu").className = "hiddenMenu active";
}

function validate(){
   return confirm('Weet u zeker dat u deze lijst wilt verwijderen?');
}


$("document").ready(function(){
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
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var list_name = $('#list_name').val();
    var user_id = $('#user_id').val();
    $('#create_button').click(function(e){
        //e.preventDefault();
        alert(list_name);
        $.ajax({
          url: '/tasklist/create',
            data: {list_name: list_name, user_id: user_id , _token: CSRF_TOKEN},
            dataType: 'text',
            type: 'GET',
            succes: function (data) {
                alert('Toegevoegd');
            },
            error: function (data) {
                alert('error');
            }
        });
    });

});
