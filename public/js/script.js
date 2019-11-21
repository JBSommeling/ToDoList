
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

    //HOVER EFFECTS
    $('.hover li').hover(function(){
       $(this).animate()
    });
});
