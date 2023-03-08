<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "habarurema_jules_221003981";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get id parameter from URL


// Check if form is submitted

$names= $_POST["names"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$email = $_POST["email"];
$id = $_POST['id'];



$sql = "UPDATE `customers` SET`names`='$names', `phone`='$phone', `address`='$address', `email`='$email' WHERE `customers`.`customerID` =$id; ";

if (mysqli_query($conn, $sql)) {
    header("Location: logout.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>
