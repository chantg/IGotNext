var firstClick = false;

function myFunction() {
  document.getElementById("search").style.width = "100%";
  firstClick = true;
}
function myFunction1() {
 
 if(firstClick){
           // do first click stuff
           firstClick = false;
	   document.getElementById("search").style.width = "33%";
       }


}

function Categories() {
  var x = document.getElementById("mobileTopnav");
  if (x.className === "mobiletopnav") {
    x.className += " open";
  } else {
    x.className = "mobiletopnav";
  }
/*
  var y = document.getElementById("downs");
  if (y.className === "dropdown-content") {
    y.className += " s";
  } else {
    y.className = "dropdown-content";
  }


  var z = document.getElementById("downB");
  if (z.className === "dropbtn") {
    z.className += " s";
  } else {
    z.className = "dropbtn";
  }
*/
}
function dropN(){
document.getElementById("dropN").style.display = "block";
}
function dropS(){
document.getElementById("dropS").style.display = "block";
}
function dropX(){
document.getElementById("dropX").style.display = "block";
}
function dropP(){
document.getElementById("dropP").style.display = "block";
}
function dropO(){
document.getElementById("dropO").style.display = "block";
}
