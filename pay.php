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
$amount = $_POST["amount"];




$sql = "INSERT INTO `payment` (`customerID`, `amount`, `paymentDate`) VALUES ('$id', '$amount', current_timestamp());";

if ($conn->query($sql) === TRUE) {
    echo"your payment sent secsessfull";
  header("Location: payment.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
