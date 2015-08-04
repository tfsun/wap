function pageLoad() {
  document.getElementById("biger").onclick = makebiger;
  document.getElementById("bling").onchange = bling;
  document.getElementById("Malkovitch").onclick = Malkovitch;
}
var timer = null;
function makebiger() {
  alert("Hello, world!");
  var size = parseInt(document.getElementById("texta").style.fontSize);
  if (isNaN(size)) {
    size = 12;  
  }
  document.getElementById("texta").style.fontSize = size + "pt";
  if (timer == null) {
    timer = setInterval(biger, 500);
  } else {
    clearInterval(timer);
    timer = null;
  }
}
function biger()
{
    var size = parseInt(document.getElementById("texta").style.fontSize);
    size += 2;
    document.getElementById("texta").style.fontSize = size + "pt";
}
function bling() {
  alert("bling!");
  if(document.getElementById("bling").checked==true)
  {
      document.getElementById("texta").className="textChecked";
      document.getElementById("body").className="bodyChecked";
  }
  else {
      document.getElementById("texta").className="textNormal";
      document.getElementById("body").className="";
  }
}

function Malkovitch() {
  var text = document.getElementById("texta").innerHTML;
  if(text.length>5) {
      document.getElementById("texta").innerHTML = "                    Malkovitch";
  }
}

window.onload = pageLoad; 