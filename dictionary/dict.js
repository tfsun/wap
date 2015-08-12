/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
"use strict";
$(document).ready(function(){
    $("#lookup").click(function(){
        var word = $("#word").val();
//        alert(word);
        $.ajax({
            url: 'dict.php',
            type: 'POST',
            data: {"word" :word}
        })
        .done(showDefinition)
        .error(showError);
    });
    function showDefinition(data) {
        var obj=JSON.parse(data);
        for(var i=0; i< obj.length; i++) {
          $('#deflist').append("<li>wordtype: " + obj[i]["wordtype"] + "<br>definition： " + obj[i]["definition"] + "</li><hr>");
        }
    }
    function showError(data) {
        alert("showError"+data);
    }
//    function printObject(o) {
//        var out = '';
//        for (var p in o) {
//            out += p + ': ' + o[p] + '\n';
//        }
//        alert(out);
//    }
});

