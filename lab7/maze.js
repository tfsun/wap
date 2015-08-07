$(document).ready(function(){
    $(".boundary").mouseover(function(){
        $(".boundary").css("background-color","red");
        $("#status").text("Sorry, you lost.:[");
        //alert("Sorry, you lost.:[");
    }); 
    $("#end").mouseover(function(){
        $("#status").text("You win!:]");
        //alert("You win!:]");
    });
    $("#start").click(function(){
        $(".boundary").css("background-color","#eeeeee");
    });
//    $("#body").mouseover(function) () { 
//    });
//    $(".boundary").mouseout(function(){
//        $(".boundary").css("background-color","#eeeeee");
//    });  
});



