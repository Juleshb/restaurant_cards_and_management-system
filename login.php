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

    $sql = "SELECT * FROM employer WHERE Email='$Email' AND Password	='$Password'";
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

<html>
<head>
    <title>Login Form</title>
    <style>
      /* CSS styles for the form */
      
    </style>
</header>
<body>
<h2 >Login here ...</h2>
    <div >
<form action="login.php" method="post">
  <div class="form-group">
    <label for="Email">Email:</label>
    <input type="text" id="Email" name="Email">
  </div>
  <div >
    <label for="password">Password:</label>
    <input type="password"  id="Password" name="Password">
  </div>
  <button type="submit">Login</button>
</form>
</div>
</body>
