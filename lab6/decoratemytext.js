function pageLoad() {
  document.getElementById("biger").onclick = makebiger;
  document.getElementById("bling").onchange = bling;
  document.getElementById("Malkovitch").onclick = Malkovitch;
}
var timer = null;
var size = 12;
function makebiger() {
  if (timer == null) {
    timer = setInterval(biger, 500);
  } else {
    clearInterval(timer);
    timer = null;
  }
}
function biger()
{
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