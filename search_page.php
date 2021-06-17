<?php
    $con= new mysqli("localhost","root","Unr301G4m3r","Store");
    $name = $_POST['search'];
    //$query = "SELECT * FROM employees
   // WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM VideoGame Where TITLE LIKE '%{$name}%'");

while ($row = mysqli_fetch_array($result))
{
        echo $row['TITLE'] . " " . $row['PRICE'];
        echo "<br>";
}
    mysqli_close($con);
    ?>
