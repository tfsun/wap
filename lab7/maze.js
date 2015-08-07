"use strict";
$(document).ready(function(){
    var beStart = false;
    var win  = true;
    $(".boundary").mouseover(function(){
        checkHit();
    }); 
    $("#maze").mouseleave(function(){
        checkHit();
    }); 
    $("#end").mouseover(function(){
        if(beStart === true && win === true){
            $("#status").text("You win!:]");        
        }
        beStart = false;
        setTimeout(function(){
                $("#status").text('Click the "S" to begin.');  
            },1000);
    });
    $("#start").click(function(){
        $(".boundary").css("background-color","#eeeeee");
        $("#status").text('now start.');  
        beStart = true;
        win = true;
    });
    function checkHit(){
        if(beStart === true) {
            $(".boundary").css("background-color","red");
            $("#status").text("Sorry, you lost.:[");
            win = false;
            beStart = false;
            setTimeout(function(){
                $("#status").text('Click the "S" to begin.');  
            },1000);
        }
    }
});



