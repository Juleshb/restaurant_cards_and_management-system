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

if (isset($_POST["Email"]) && isset($_POST["Password"])) {
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    $sql = "SELECT * FROM customers WHERE Email='$Email' AND Password	='$Password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to a protected page
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["Email"] = $Email;
        header("Location: home.php");
    } else {
        // Login failed, display an error message
        echo "Wrong username or password. Please try again.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    </head>
<body>
  <center>
    

<div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-5 align-self-center">
          <form id="contact" action="login.php" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                <input type="text" id="Email" name="Email" placeholder="Your Email">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                <input type="password"  id="Password" name="Password" placeholder="Your Password">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button">Log in</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
</center>
</body>
