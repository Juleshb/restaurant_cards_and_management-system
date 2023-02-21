<?php

session_start();



if (!isset($_SESSION["Email"])) {
  header("Location: login.php");
  exit;
}

?>


<html>
  <head>
    
    <title>Welcome to My Landing Page</title>
  </head>
  <body>
  <div><a href="home.php">Home</a>
  <a  href="customer.php">Customers</a>
  <a href="#news">Payment</a>
  <a href="#news">price</a>
  <a href="updateadimin.php">Profile</a>
  <a href="logout.php" class="logou">Logout</a>
  <a href="logout.php" class="logou"><?php echo "Hey 🙌 " . $_SESSION["Email"];?></a>
 
</div>
