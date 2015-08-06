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

 var newAccount = (function() { 
     var accounts = [];
     return function printAccounts() {
        var name = document.getElementById("name").value;
        var deposit = document.getElementById("deposit").value;
        var account = {
            'name' : name,
            'deposit' :deposit
        };
        accounts[accounts.length] = account;
        var text = "";
        for (index = 0; index < accounts.length; index++) {
            text += "Account name: " + name + " balance: " + deposit + "\n";
            //(accounts[index].name);
            // += "<li>" + accounts[index].name + ":" + accounts[index].deposit + "</li>";
            
            //document.write(text);
        }
        document.getElementById("texta").innerHTML = text;
     }
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