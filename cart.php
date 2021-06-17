<html>
<head>
<title>Games</title>
<meta name ="CSS" content = "CSS from w3 schools">
<meta name = "author" content = "Timothy Chan">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="/css/w.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script src="javascript/topNav.js" async></script>
<script src="javascript/accordion.js" async></script>
<script src="javascript/addProduct.js" async></script>
<script src="javascript/cart.js" async></script>

<script src="https://www.paypal.com/sdk/js?client-id=Adq8wFH5_uLKgdpa699xvau35XGg8S2a-EfWJrdvPgq5rYuj4BVkJx5czrklEpNtSxxpLOtYRWNtfIq8&currency=USD&disable-funding=paylater" data-sdk-integration-source="button-factory"></script>
  <script src = javascript/paypal.js async></script>
	
<link rel="shortcut icon" href="#">
 	  
<script>
</script>

</head>
<?php
function getIP()
{
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

printf("<body onload='cartIsEmpty(\"%s\")'>", $IP);

//printf('<input type = "button" onclick = "getCookie(\"%s\")" value = "Display">',$IP);

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
<main id="cart-main">
        <div class="containers">
            <div class="grid">
<?php
$cart = $_COOKIE[str_replace('.', '_', $IP) ];
function SQLwhere()
{

}
$subtotal = 0.0;
$servername = "localhost";
$username = "root";
$password = "Unr301G4m3r";
$dbname = "Store";
$items = array();

foreach (explode(",", $cart) as & $item)
{
    if (!empty($item))
    {
        $items[$item] += 1;
    }
}

//if cart is not empty load a table
if (count($items) != 0)
{
    foreach ($items as $item => $count)
    {
        $total = 0;
        $resStr = "pictures/";
        $resStr .= str_replace(' ', '_', $item);
	echo "<a href = '/game.php?Title=" .$item. "'>";

        print ('      <div class="col-1">
                      <div class="flex item justify-content-between">
                          
                        <div class="flex">
                            <div class="img text-center">
                               ');
        echo '<img class = "pic" src ="' . $resStr . '" alt =' . $item . '></div>';
        echo ('<div class="title">
                                <h3>' . $item . '</h3>
                                <span>Electronics</span>
				</a>');
        try
        {
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            $sql = "SELECT COUNT(Title) AS NumberOfProducts FROM Products WHERE Title = '" . $item . "'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo ('                                <div class="buttons">');
            if ($row["NumberOfProducts"] > $count)
            {
                echo ('<button type="submit"><i class="fa fa-chevron-up"></i> </button>');
            }
            echo (' <input type="text" class="font-title" value='.$count.' readonly>
		     
			</div>
                                ');
            printf('<a href="" onclick="deleteItem(this,\'%s\',\'%s\')">Delete From Cart</a>', $IP, $item);
            echo ('
                            </div>
                        </div>
');
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
	echo "<div class = 'spacing'></div>";


        //find the price of the game
        try
        {
            $sql = "SELECT Price FROM Products WHERE Title ='" . $item . "'";
            $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            echo ('<div class="price">                            
	     <h4 class="text-red">');

            if ($result->num_rows > 0)
            {
		$price = sprintf("%01.2f", $count * $row['Price']);
		echo "$".$price*$count;
                echo ('</h4>
                        </div>
                    </div>
                </div>');
            }
            else
            {
                echo "Error";
            }
            $total = $count * $price;
            $subtotal += $total;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }

    }
    $conn->close();
}
?>
                <div class="col-2">
                    <div class="subtotal text-center">
                        <h3>Price Details</h3>
                        <ul>
                            <li class="flex justify-content-between">
                                <label id="quantity" for="price">Products ( <?php echo count($items); ?> items ) :</label>
                                <span id = "total">$<?php $price = sprintf("%01.2f", $subtotal);
				echo $price;
 				?></span>
                            </li>
                            <li class="flex justify-content-between">
                                <label for="price">Delivery Charges : </label>
                                <span><?php echo "TBD"; ?></span>
                            </li>
                            <hr>
                            <li class="flex justify-content-between">
                                <label for="price">Amout Payble : </label>
                                <span id= "total" class="text-red font-title">$<?php $price = sprintf("%01.2f", $subtotal);
				echo $price;
 				?></span>
                            </li>
                        </ul>
<script src="javascript/googlePay.js"></script>

<div id="containerGoogle"></div>
<script
  src="https://pay.google.com/gp/p/js/pay.js"
  onload="onGooglePayLoaded()"></script>

                        <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
                    </div>
                </div>


            </div>
        </div>
    </main>


</body>
</div>
<script>

</script
</html>