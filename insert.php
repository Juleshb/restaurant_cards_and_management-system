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

$names= $_POST["names"];
$phone = $_POST["phone"];
$address= $_POST["address"];
$email = $_POST["email"];
$password= $_POST["password"];




$sql = "INSERT INTO `customers`(`names`, `phone`, `address`, `email`, `password`) VALUES('$names', '$phone','$address','$email','$password')";

if ($conn->query($sql) === TRUE) {
  header("Location: customer.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
