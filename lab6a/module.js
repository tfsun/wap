 "use strict";
 var rudyTimer= (function() {
    var timer = null;  // stores ID of interval timer
    function rudy() {   // called each time the timer goes off
      document.getElementById("output").innerHTML += " Rudy!";
    }
    return function delayMsg2() {
      if (timer === null) {
        timer = setInterval(rudy, 1000);
      } else {
        clearInterval(timer);
        timer = null;
      }
    };
 })(); 
 var accounts = [];
 var newAccount = (function() { 
     return function printAccounts() {
        var name = document.getElementById("name").value;
        var deposit = document.getElementById("deposit").value;
        var account = {
            'name' : name,
            'deposit' :deposit
        };
        accounts[accounts.length] = account;
        var text = "";
        for (var index = 0; index < accounts.length; index++) {
            text += "Account name: " + accounts[index].name + " balance: " + accounts[index].deposit + "\n";
//            var tmpAccount = (function(n) {
//                return function() { return accounts[n]; }
//            })(index)(); 
//            text += "Account name: " + tmpAccount.name + " balance: " + tmpAccount.deposit + "\n";
        }
        document.getElementById("texta").innerHTML = text;
     };
 })();
/*
function pageLoad() {
  document.getElementById("clickme").onclick = delayMsg2;
}
var timer = null;  // stores ID of interval timer

function delayMsg2() {
  if (timer === null) {
    timer = setInterval(rudy, 1000);
  } else {
    clearInterval(timer);
    timer = null;
  }
}

function rudy() {   // called each time the timer goes off
  document.getElementById("output").innerHTML += " Rudy!";
}

window.onload = pageLoad; 
*/