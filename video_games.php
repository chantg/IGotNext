<!--css from w3 schools -->
<html>
<head>
<title>Games</title>
<meta name ="CSS" content = "CSS from w3 schools">
<meta name = "author" content = "Timothy Chan">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/w.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="javascript/accordion.js" async></script>
<script src="javascript/topNav.js" async></script>
<script src="javascript/addProduct.js" async></script>
<script src="javascript/cart.js" async></script>
<script src="javascript/modal.js" async></script>
<script src="javascript/checked.js" async></script>

<script>
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
</script>

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
      <a href="video_games.php?name=Nintendo 64">Nintendo 64</a>
      <a href="video_games.php?name=Gamecube">Gamecube</a>
      <a href="video_games.php?name=NES">NES</a>   
    </div>
  </div> 
    <div class="dropdown" id ="downs">
    <button class="dropbtn" id ="downB" style = "font-family: SEGA;font-size:24px">SEGA
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content"id="drops">
      <a href="video_games.php?name=SEGA Genesis">Genesis</a>
      <a href="video_games.php?name=Dreamcast">Dreamcast</a>
      <a href="video_games.php?name=Saturn">Saturn</a>
    </div>
  </div> 
    <div class="dropdown" id ="downs">
    <button class="dropbtn"id ="downB" style = "font-family: GStation">PLAYSTATION 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content"id="drops">
      <a href="video_games.php?name=Playstation1">Playstation 1</a>
      <a href="video_games.php?name=Playstation2">Playstation 2</a>
      <a href="video_games.php?name=Playstation3">Playstation 3</a>
    </div>
  </div> 
  <div class="dropdown" id ="downs">
    <button class="dropbtn" id ="downB"style = "font-family: Exbox">XBOX 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content"id="drops">
      <a href="video_games.php?name=Xbox">Original</a>
      <a href="video_games.php?name=Xbox360">Xbox 360</a>
      <a href="video_games.php?name=XboxOne">Xbox One</a>
    </div>
  </div> 
    <div class="dropdown" id ="downs">
    <button class="dropbtn" id ="downB">OTHER 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content"id="dropO">
      <a href="#">Consoles</a>
      <a href="#">Rare Games</a>
      <a href="#">Cables</a>
    </div>
  </div>
  <div class="containers">
      <form action="video_games.php"  method="GET" class="form">
        <input id = "search"  onclick = "myFunction()" type="search" placeholder="Search" name = "game" class="search-field" autocomplete="off">
        <button type="submit" class="search-button">
          <img src="pictures/search.png">
        </button>
      </form>
    </div>
  <a href="javascript:void(0);" style="font-size:15px;float:left" class="icon" onclick="Categories()">&#9776;</a>
</div>

<div class="mobiletopnav" id="mobileTopnav">
    <div class="dropdown">
      Nintendo
    <ul class = "topnav">    
      <li>
      <a href="video_games.php?name=Nintendo 64">Nintendo 64</a>
    </li>
    <li>
    <li>
      <a href="video_games.php?name=Gamecube">Gamecube</a>
    </li>
    <li>
      <a href="video_games.php?name=NES">NES</a>   
    </li>
  </ul>
    SEGA
  <ul class = "topnav">
    <li>
      <a href="video_games.php?name=Genesis">Genesis</a>
    </li>    
    <li>
      <a href="video_games.php?name=Dreamcast">Dreamcast</a>
    </li>
    <li>    
      <a href="video_games.php?name=Saturn">Saturn</a>
    </li>
  </ul>  
    PLAYSTATION 
   <ul class = "topnav">
    <li>
      <a href="video_games.php?name=Playstation1">Playstation 1</a>
    </li> 
    <li>
      <a href="video_games.php?name=Playstation2">Playstation 2</a>
    </li>
    <li>    
  <a href="video_games.php?name=Playstation3">Playstation 3</a>
    </li>
     </ul>
   XBOX 
    <ul class = "topnav">
    <li>
      <a href="video_games.php?name=Xbox">Original</a>
     </li>
     <li>
      <a href="video_games.php?name=Xbox360">Xbox 360</a>
      </li>
      <li>
      <a href="video_games.php?name=XboxOne">Xbox One</a>
      </li>
      </ul>
    OTHER 
    <ul class = "topnav">
    <li>
      <a href="#">Consoles</a>
    </li>
    <li>
      <a href="#">Rare Games</a>
    </li>
    <li>
      <a href="#">Cables</a>
    </li>
    </ul>
  </div>
</div>

<!--
<div id="mySidebar" class="sidebar">

<button class="dropdown-btn">Price 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">Console</a>
  <a href="#">Price</a>
</div>
  <div class="sidenav">
  <div id="checkbox-container">
  <h3>Price</h3>
   <div>
  <input type="checkbox" id="l2high" name="vehicle1" onclick="sortBy('orderby','Price ASC')" autocomplete="off">
	<label for="Low to High">Low to High</label><br>
  </div>
  <div>
  <input type="checkbox" id="high2low" name="vehicle2" value="Car" onclick="sortBy('orderby','Price DESC')" autocomplete="off">
  <label for="High to Low">High to Low</label><br>
  </div>
  </div>

  </div>

-->
<div class="dropdownr">
  <button class="dropbtnr">Sort By</button>
  <div class="dropdown-contentr">
  <a onclick="sortBy('orderby','Price ASC')">Price Low to High</a>
  <a onclick="sortBy('orderby','Price DESC')">Price High to Low</a>
  <a onclick="sortBy('orderby','Title')">Name: A-Z</a>
  <a onclick="sortBy('orderby','Title DESC')">Name: Z-A</a>
  </div>
</div>

<div onClick="myFunction1()" class ="main">
 

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h4>Added item to Cart</h4>
    </div>

<div class="card" >
	<img id="itempic" src ="" class = 'cardPic' alt ="Item">
	<h3 id="item"></h1>
	<p id = "value" class='price'>Price: $</p>
      
    </div>	


<div class = "checkout">
    <a href = "cart.php"> <button class = "but" type="button">
         Proceed to checkout</button> </a>
	<p id="quantity"></p>
	<button class = "butt" id = "continueShopping" type="button">
         Continue Shopping</button>

	</div>

</div>
</div>

<!--
<button class="openbtn" onclick="openNav()">☰ Sort By</button>  
  <h2>Collapsed Sidebar</h2>
-->
<?php
$cart = [];
//array_push($cart,
$servername = "localhost";
$username = "root";
$password = "Unr301G4m3r";
$dbname = "Store";
$cart = $_COOKIE[str_replace('.', '_', $IP) ];
$items = array();
$products = array();
$isSelected = array();
foreach (explode(",", $cart) as & $item)
{
    if (!empty($item))
    {
        $items[$item] += 1;
    }
}

try {
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
$mysql = new mysqli($servername, $username, $password, $dbname);
foreach($items as $key => $value){
  $sqlCount = "SELECT COUNT(Title) AS NumberOfProducts FROM VideoGame WHERE Title = '" . $key . "'";
      $resultCount = $mysql->query($sqlCount);
      while($rowCount = $resultCount->fetch_assoc()){
	$isSelected[$key] = $rowCount['NumberOfProducts'];
  }
}


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if(htmlspecialchars($_GET["game"])=="" and htmlspecialchars($_GET["name"])!=""){
    $sql = "SELECT Title, Price, Console FROM Products WHERE Console = '".htmlspecialchars($_GET['name'])."'";
  }
  elseif(htmlspecialchars($_GET["game"])!="" and htmlspecialchars($_GET["name"])==""){
    $sql = "SELECT Title, Price, Console FROM Products WHERE Title LIKE '%".htmlspecialchars($_GET['game'])."%'";
  }
  else
  {
    $sql = "SELECT Title, Price, Console FROM Products ";
  }
  if(htmlspecialchars($_GET["orderby"])!="")
  {
    $sql .= " ORDER BY ".htmlspecialchars($_GET["orderby"]);
  }
  $result = $conn->query($sql);
  echo "<div class = 'row'>";
  if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;
		
    while($row = $result->fetch_assoc()) {
     if($i ==4){
	$i =0;
	echo "</div>";
	echo "<div class = 'row'>";
      }
      //$sqlCount = "SELECT COUNT(Title) AS NumberOfProducts FROM VideoGame WHERE Title = '" . $row['Title'] . "'";
      //$resultCount = $mysql->query($sqlCount);
      //$rowCount = $resultCount->fetch_assoc();
    if($products[$row['Title']]!=1)
    {
    if($isSelected[$row['Title']] == NULL or $items[$row['Title']] != $isSelected[$row['Title']]){
	//check if game already printed
    $products[$row['Title']]+=1;
    ++$i;
    $resStr = "pictures/";
    $resStr .= str_replace(' ', '_', $row["Title"]);
    $title = str_replace("'","~",$row['Title']);
    $printString = str_replace("'","~",$resStr);
    echo "<div class = 'column'>";
	echo "<a href = \"/game.php?Title=".$row['Title']."\">";
      echo "<div class = 'card'>";
      echo "<img src =". $resStr." class = 'cardPic' alt =". $row['Title'].">";
      if(str_word_count($row['Title'])>2){
	echo "<h4>".$row['Title']."</h4>";
      }
      else{
	echo "<h2>".$row['Title']."</h2>";
	}
      echo" <p class='cPrice'>For " .$row['Console']."<br></br>Price: $";
	$price = sprintf("%01.2f</p>", $row['Price']);
	echo $price;

      //echo "<h1>".$row['Title']."</h1> <p class='price'>$".$row['Price']."</p><p>Some text about the game..</p>"
	echo "</a>";
printf("\n<button id='myBtn' onclick='addCart(\"%s\", \"%s\",\"%s\",\"%s\")'>Add to Cart\n<i class='fa fa-shopping-cart'></i></button>\n",$IP,$title, $printString ,$row['Price']);
//echo "<p><a href="#0" class="cd-add-to-cart js-cd-add-to-cart" data-price='".$row['Price']."'>Add to Cart</a></p>";
      //echo "Title: " . $row["Title"]. " - Price: " . $row["Price"]. "-console " . $row["console"]. "<br>";
     echo "</div></div>";

}
  //end check if inventry has enough to add
 }
	}
  } else {
    echo "No Results Found";
  }
//close row
echo "</div>";

$conn->close();
$mysql->close();
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>
</div>


</body>
<script>
</script>
</html>
