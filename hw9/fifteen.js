"use strict";
$(document).ready(function(){
    var tiles = []; 
    function initTiles() {
        for(var i=0; i<16; i++){
            var x = parseInt((i % 4) * 100) ;
            var y = (Math.floor(i / 4) * 100) ;
            var tile = {
                "value" : i+1,
                "x" : x,
                "y" : y,
                "bx" : -x,
                "by" : -y,
            };
            tiles[i] = tile;
        }
        tiles[15].value = -1;
    }
    function display(){
        var i = 0;
        $("div").each( function(){
            if($(this).attr('id') !== "puzzlearea" && $(this).attr('id') !== "w3c"){
                if(tiles[i].value===-1) {
                    i++;
                }
                $(this).addClass("puzzlepiece");
                $(this).removeClass("movablepiece");
                $(this).text(tiles[i].value);
                $(this).css("left",tiles[i].x+"px");
                $(this).css("top",tiles[i].y+"px");
                $(this).css("backgroundPosition",tiles[i].bx + 'px ' + (tiles[i].by) + 'px');
                i++;
            }
        });
    }
    var init = function(){  
        initTiles();
        display();
    };
    init();
    var randomArray = function() {
        var currentIndex = tiles.length;

        while (0 !== currentIndex) {
            var randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;
            changeTile(currentIndex, randomIndex);
        }
        //If the grid width is odd, then the number of inversions in a solvable situation is even.
        //If the grid width is even, and the blank is on an even row counting from the bottom (second-last, fourth-last etc), then the number of inversions in a solvable situation is odd.
        //If the grid width is even, and the blank is on an odd row counting from the bottom (last, third-last, fifth-last etc) then the number of inversions in a solvable situation is even.
        //(grid width odd) && (#inversions even) 
        var inversion = 0;
        var rowblank = -1;
        for(var i=0; i<16 ; i++) {
            if(tiles[i].value === -1) {
                rowblank = 4 - Math.floor(i/4); //alert(rowblank);
            }
            for(var j=i+1; j<16; j++)
            {
                if(tiles[i].value !== -1 && tiles[i].value !== -1
                        && tiles[i].value > tiles[j].value) {
                    inversion++;
                }
            }
        }
        //alert(inversion);
        if(inversion%2 === rowblank%2) {
            randomArray();
        }
    };
    $("#shufflebutton").click(function(){
        randomArray();
        display();
    });
    $(".puzzlepiece").each(function(){
        $(this).click(function(){
            var val = parseInt($(this).text());
            var poss = getChangePos(val);
            //alert(poss[0] + "----" + poss[1]);
            if(poss[0] !== -1 && poss[1] !== -1){
                changeTile(poss[0],poss[1]);
                display();
            }
        });
        $(this).hover(
            function(){
                var val = parseInt($(this).text());
                var poss = getChangePos(val);
                if(poss[0] !== -1 && poss[1] !== -1)
                {
                    $(this).addClass("movablepiece");
                }
            },
            function(){
                var val = parseInt($(this).text());
                var poss = getChangePos(val);
                if(poss[0] !== -1 && poss[1] !== -1)
                {
                    $(this).removeClass("movablepiece");
                }
        });
    });
    function getChangePos(val) {   
        var ret = [-1, -1];
        if(val !== -1) {
            for(var i=0; i< 16; i++) {
                if(tiles[i].value === val) {
                    ret[0] = i;
                    if(true === canChange(i,i-4)) ret[1] = i-4;
                    else if(true === canChange(i,i-1)) ret[1] = i-1;
                    else if(true === canChange(i,i+1)) ret[1] = i+1;
                    else if(true === canChange(i,i+4)) ret[1] = i+4;
                    break;
                }
                
            }
        }
        return ret;
    }
    function canChange(i, j) {
        var ret = false;
        if(j>-1 && j<16 && tiles[j].value === -1 ){
            ret = true;
            if(Math.abs(i-j) === 1 && Math.floor(i/4) !== Math.floor(j/4)) {
                ret = false;
            }
        }
        return ret;
    }
    function changeTile(i, j) {
        var temporaryValue = tiles[i].value;
        tiles[i].value = tiles[j].value;
        tiles[j].value = temporaryValue;

        temporaryValue = tiles[i].bx;
        tiles[i].bx = tiles[j].bx;
        tiles[j].bx = temporaryValue;

        temporaryValue = tiles[i].by;
        tiles[i].by = tiles[j].by;
        tiles[j].by = temporaryValue;
    }
});
