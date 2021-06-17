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
$cart = $_COOKIE[str_replace('.', '_', $IP) ];

$servername = "localhost";
$username = "root";
$password = "Unr301G4m3r";
$dbname = "Store";
$ID = "'".$_POST['ID']."'";
$Name = "'".$_POST['Name']."'";
$Price = $_POST['Price'];
$Address = "'".$_POST['Address']."'";
$Email ="'". $_POST['Email']."'";
$cart = "'". $cart ."'";
$items= array();
$response = array('Name'=>$Name,'Email'=>$Email,'Price'=>$Price,"Address"=>$Address);
echo json_encode($response);
$conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO Invoices VALUES (".$ID.", ".$Name.", ".$Price.",".$Address.",".$Email.", ".$cart.")";
   if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
foreach (explode(",", $cart) as & $item)
{
    if (!empty($item))
    {
        $items[$item] += 1;
    }
}
foreach ($items as $key => $value)
{

$sql = "DELETE FROM Products WHERE Title=".$key." LIMIT ".$value;
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
}
$conn->close();
?>
