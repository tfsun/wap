$(document).ready(function(){
    //$("p").hide();
//    $("#button").click(function(){
//        //$("span.Italian").toggle();
//        $("p#mytext").show();
//    });
//    $("div").click(function() {
//        alert("You clicked me."); 
//    });
//    $(".guess_box").click( function() {
//        var discount = Math.floor((Math.random()*5) + 5);
//        var discount_msg = "<p>Your Discount is "+ discount +"%</p>";
//        alert(discount);
//    });
    $(".guess_box").click( function() {
        $(".guess_box p").remove();
        var discount = Math.floor((Math.random()*5) + 5);
        var discount_msg = "<p>Your Discount is "+discount+"%</p>";
        alert(discount_msg);
        $(this).append(discount_msg);
    });
    function booyah1(){
    alert("BOOYAH!");
}
function booyah2(){
    return setTimeout(function(){alert("BOOYAH!");}, 2000);
}
//setTimeout(booyah1, 2000);
setTimeout(booyah2(), 2000);
});

