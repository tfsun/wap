"use strict";
window.onload = function(){
    document.getElementById("start").onclick = start;
    document.getElementById("stop").onclick = stop;
    document.getElementById("animation").onchange = selectAnimation;
    document.getElementById("size").onchange = selectSize;
    document.getElementById("stop").disabled = true;
    //document.getElementById("speed").onchange = selectSpeed;
};
var timer = null;
var frame = 0;
var usertext = "";

function start() {
    usertext = document.getElementById("texta").value;
    play();
    document.getElementById("texta").disabled = true;
    document.getElementById("animation").disabled = true;
    document.getElementById("start").disabled = true;
    document.getElementById("stop").disabled = false;
}
function stop() {
    if(timer !== null) {
        clearTimeout(timer);   
        timer = null;
    }
    document.getElementById("texta").value = usertext;
    document.getElementById("texta").disabled = false;
    document.getElementById("animation").disabled = false;
    document.getElementById("start").disabled = false;
    document.getElementById("stop").disabled = true;
}
function play() {
    var animName = document.getElementById("animation").value;
    var anims = ANIMATIONS[animName].split("=====\n");
    if(frame>=anims.length) {
        frame=0;
    }
    document.getElementById("texta").value = anims[frame];
    frame = frame+1;
    var speed = getSpeed();
    timer = setTimeout(play,speed);
}
function getSpeed() {
    var speed = 250;
    var speedTurbo = document.getElementById("speed").checked;
    if(speedTurbo===true) {
        speed = 50;
    }
    return speed;
}
function selectAnimation() {
    var animName = document.getElementById("animation").value;
    document.getElementById("texta").value = ANIMATIONS[animName];
}
function selectSize() {
    var animSize = document.getElementById("size").value;
    document.getElementById("texta").style.fontSize = animSize;
}
/*
function start() {
    var speed = getSpeed();
    usertext = document.getElementById("texta").value;
    timer = setInterval(play, speed);
    document.getElementById("texta").disabled = true;
    document.getElementById("animation").disabled = true;
}
function stop() {
    if(timer !== null) {
        clearInterval(timer);
        timer = null;
    }
    //alert(usertext);
    document.getElementById("texta").value = usertext;
    document.getElementById("texta").disabled = false;
    document.getElementById("animation").disabled = false;
}
function play() {
    var animName = document.getElementById("animation").value;
    var anims = ANIMATIONS[animName].split("=====\n");
    if(frame>=anims.length) {
        frame=0;
    }
    document.getElementById("texta").value = anims[frame];
    frame = frame+1;
}*/

/*
function selectSpeed() {
    var speed = getSpeed();
    //timer = setInterval(play, speed);
}
*/
