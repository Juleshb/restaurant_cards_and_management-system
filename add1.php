<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "habarurema_jules_221003981";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id= $_POST["id"];
$amount = 0;




$sql = "INSERT INTO `customeraccount` (`customerID`, `amount`) VALUES ('$id', '$amount');";

if ($conn->query($sql) === TRUE) {
   
  header("Location: customer.php");
  echo"your payment sent secsessfull";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
