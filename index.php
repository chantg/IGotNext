<!DOCTYPE html>
<!--Timothy Chan, css from w3 schools -->
<html>
<head>
<title>I Got Next</title>
<meta name ="CSS" content = "CSS from w3 schools">
<meta name = "author" content = "Timothy Chan">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="/css/a.css">
-->
<link rel="stylesheet" href="/css/w.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="javascript/slideshow.js" async></script>
<script src="javascript/topNav.js" async></script>
<script src="javascript/cart.js" async></script>


</head>
<?php
function getIP(){
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    return $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    return $_SERVER['REMOTE_ADDR'];
  }
}
$IP = getIP();
printf("<body onload='cartIsEmpty(\"%s\")'>",$IP);
//echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
?>

<!-- Navigation -->
<nav class="w3-bar w3-black">
  <a href="/" class="w3-button w3-bar-item" style = "font-family: IGotNext;">I Got Next</a>
  <!--
  <a href="about-us.html" class="w3-button w3-bar-item" style = "font-family: IGotNext;">About Us</a>
  <a href="contact.html" class="w3-button w3-bar-item" style = "font-family: IGotNext;">Contact</a>
  -->
   <a id = "cart" href="cart.php" class="w3-button w3-bar-item" style = "float: right;font-family: IGotNext;">Cart <i class="fa fa-shopping-cart"></i></a>
  
</nav>

<!-- Navigation Categories-->
<div class="topnav" id="myTopnav" >
    <div class="dropdown" id ="downs">
    <button class="dropbtn" id ="downB" style = "font-family: Pretendo">Nintendo
     <i class="fa fa-caret-down"style="margin-right:26px"></i>
    </button>
    <div class="dropdown-content" id="drops">
      <a href="products.php?name=N64">Nintendo 64</a>
      <a href="products.php?name=Gamecube">Gamecube</a>
      <a href="products.php?name=NES">NES</a>   
    </div>
  </div> 
    <div class="dropdown" id ="downs">
    <button class="dropbtn" id ="downB" style = "font-family: SEGA;font-size:24px">SEGA
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content"id="drops">
      <a href="products.php?name=SEGA Genesis">Genesis</a>
      <a href="products.php?name=Dreamcast">Dreamcast</a>
      <a href="products.php?name=Saturn">Saturn</a>
    </div>
  </div> 
    <div class="dropdown" id ="downs">
    <button class="dropbtn"id ="downB" style = "font-family: GStation">PLAYSTATION 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content"id="drops">
      <a href="products.php?name=Playstation1">Playstation 1</a>
      <a href="products.php?name=Playstation2">Playstation 2</a>
      <a href="products.php?name=Playstation3">Playstation 3</a>
    </div>
  </div> 
  <div class="dropdown" id ="downs">
    <button class="dropbtn" id ="downB"style = "font-family: Exbox">XBOX 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content"id="drops">
      <a href="products.php?name=Xbox">Original</a>
      <a href="products.php?name=Xbox360">Xbox 360</a>
      <a href="products.php?name=XboxOne">Xbox One</a>
    </div>
  </div> 
    <div class="dropdown" id ="downs">
    <button class="dropbtn" id ="downB">OTHER 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content"id="dropO">
      <a href="products.php?type=Console">Consoles</a>
      <a href="products.php?type=Accessory">Rare Games</a>
      <a href="#">Cables</a>
    </div>
  </div>
  <div class="containers">
      <form action="products.php" method="GET" class="form">
        <input id = "search"  onclick = "myFunction()" type="search" placeholder="Search" name = "game" class="search-field" />
        <button type="submit" class="search-button">
          <img src="pictures/search.png">
        </button>
      </form>
    </div>
  <a href="javascript:void(0);" style="font-size:15px;float:left" class="icon" onclick="Categories()">&#9776;</a>
</div>


<div class="mobiletopnav" id="mobileTopnav">
    <div class="dropdown">
	<div style = "font-family: Pretendo">
      Nintendo
	</div>
    <ul class = "topnav" >    
      <li>
      <a href="products.php?name=N64">Nintendo 64</a>
    </li>
    <li>
    <li>
      <a href="products.php?name=Gamecube">Gamecube</a>
    </li>
    <li>
      <a href="products.php?name=NES">NES</a>   
    </li>
  </ul>
	<div style = "font-family: SEGA;font-size:24px">
    SEGA
	</div>
  <ul class = "topnav">
    <li>
      <a href="products.php?name=Genesis">Genesis</a>
    </li>    
    <li>
      <a href="products.php?name=Dreamcast">Dreamcast</a>
    </li>
    <li>    
      <a href="products.php?name=Saturn">Saturn</a>
    </li>
  </ul>  
	<div style = "font-family: GStation">
    PLAYSTATION 
	</div>
   <ul class = "topnav" >
    <li>
      <a href="products.php?name=Playstation1">Playstation 1</a>
    </li> 
    <li>
      <a href="products.php?name=Playstation2">Playstation 2</a>
    </li>
    <li>    
  <a href="products.php?name=Playstation3">Playstation 3</a>
    </li>
     </ul>
	<div style = "font-family: Exbox">
   XBOX 
	</div>
    <ul class = "topnav" >
    <li>
      <a href="products.php?name=Xbox">Original</a>
     </li>
     <li>
      <a href="products.php?name=Xbox360">Xbox 360</a>
      </li>
      <li>
      <a href="products.php?name=XboxOne">Xbox One</a>
      </li>
      </ul>
    OTHER 
    <ul class = "topnav">
    <li>
      <a href="products.php?type=Console">Consoles</a>
    </li>
    <li>
      <a href="products.php?type=Accessory">Rare Games</a>
    </li>
    <li>
      <a href="#">Cables</a>
    </li>
    </ul>
  </div>
</div>

<div onClick="myFunction1()">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img id="slideShow1" class = "slideshow" src="pictures/RetroN" style="width:100%">
  <img id="slideShow1M" class = "slideshow" src="pictures/RetroN1AV_MobileBanner.jpg
" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img id="slideShow2" class = "slideshow" src="pictures/Alpha_Star" style="width:100%">
  <img id="slideShow2M" class = "slideshow" src="pictures/AlphaStar_MobileBanner.jpg
" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img id="slideShow3" class = "slideshow" src="pictures/Hyper_Podium" style="width:100%">
  <img id="slideShow3M" class = "slideshow" src="pictures/HyperPodium_MobileBanner.png" style="width:100%">

<!--  <div class="text">Caption Three</div> -->
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<!-- short description
<section class="w3-container w3-center w3-content" style="max-width:600px">
  <h2 class="w3-wide">Store Page</h2>
  <p class="w3-opacity"><i>Games and Electronics</i></p>
  <p class="w3-justify">This is some sample text, a mission statement might go here Buy used video games, original game systems and old school gaming accessories for sale at the largest family run retro video game online store. Shop all our vintage 100% authentic products.</p>
</section>
-->


<section class="w3-row-padding w3-center w3-light-grey">
  <article class="w3-third">
  <a href="products.php?type=Game"> 
    <div class="container">
  <img src="pictures/retro.jpg" alt="Games" >
  <button class="btn">Games</button>
</div>
</a>
  </article>
  <article class="w3-third">
    
    <a href = "products.php?type=Console">
    <div class = "container">
    <img src="pictures/NES1.jpg"  alt="Random Name">
    <button class="btn">Consoles</button>
    </div>
    </a>
  </article>
  <article class="w3-third">
    <a href ="products.php?type=Accessory">
    <div class = "container">
    <img src="pictures/Controllers1.jpg" alt="Random Name" >
    <button class="btn">Accessories</button>
    </div>
    </a>
  </article>
</section>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
  <a href="#"><i class="fa fa-facebook-official"></i></a>
  <a href="#"><i class="fa fa-pinterest-p"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-flickr"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  
</footer>
</div>

</body>
</html>

