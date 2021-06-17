
function cartIsEmpty(IP) {
  var user=getCookie(IP);
  if (user != "") {
    document.getElementById("cart").style.color = "red";
  } else {
  	document.getElementById("cart").style.color = "white";
  }
}

function countCookie(IP){
	return getCookie(IP).split(",").length;
}
function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');

  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
	//alert(c.substring(name.length, c.length));
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function addCart(IP, item, pic,price){
  cartIsEmpty(IP);
  modal.style.display = "block";
  
  document.getElementById("itempic").src = pic.replace("~", "'");;
  document.getElementById("item").innerHTML = item.replace("~", "'");;
  document.getElementById("value").innerHTML = "$"+price;
  document.getElementById("quantity").innerHTML = "Your cart contains "+ (countCookie(IP))+" items";
  var user=getCookie(IP);
  var userP=getCookie(IP+"Price");

  

  var list = "";
  if (user != "") {
	//if cart has entry add to cart
      var cart = getCookie(IP);
      var list = cart.concat(',');

	var oldPrice = getCookie(IP+"Price");
	var Plist = oldPrice.concat(',');
	var Plist = Plist.concat(price);

      var list = list.concat(item);

      setCookie(IP, list,30);
	setCookie(IP+"Price",Plist,30);
  } else {
 	//if Empty
	setCookie(IP+"Price", price,30);
  	setCookie(IP,item,30);
  }
var priceArr= getCookie(IP+"Price");
var valueArr = priceArr.split(',');
var subTotal =0;
console.log(user);
console.log(price);
for(var x =0;x<valueArr.length;++x){
	subTotal +=  parseFloat(valueArr[x]);
}
document.getElementById("subTotal").innerHTML = "Subtotal: $"+subTotal.toFixed(2);
}

function deleteItem(el, IP, item){
  var cookie = getCookie(IP);
  var userP=getCookie(IP+"Price");

  var itemArr = cookie.split(',');
  var valueArr = userP.split(',');
  for(var x =0;x<itemArr.length;++x){
      if(itemArr[x] ==item){
	  valueArr.splice(x,1);
	  itemArr.splice(x,1);
	  --x;
	}
    }
  setCookie(IP,itemArr.join(),30);;
  setCookie(IP+"Price", valueArr.join(),30);
  var element = el;
  element.parentNode.parentNode.parentNode.parentNode.remove();
}

function deleteAll(IP){
  var cookie = getCookie(IP);
  var userP=getCookie(IP+"Price");

  setCookie(IP,"",30);;
  setCookie(IP+"Price", "",30);


}