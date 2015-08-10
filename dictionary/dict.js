/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
"use strict";
$(document).ready(function(){
    $("#loader")
            .hide()
            .ajaxStart(function(){
                $(this).show;
            }).ajaxStop(function(){
                $(thid).hide();
            })
    $("#lookup").click(function(){
        var word = $("#word").text();
        $.post({
            url:"dict.php",
            data:"word:"+word,
            dataType:"jason"})
                .done(showDefinition)
                .error(showError);
    });
});

