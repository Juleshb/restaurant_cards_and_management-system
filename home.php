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
  <div>
  <a  href="#home">Home</a>
  <a href="#news">Loan</a>
  <a href="updateadimin.php">Profile</a>
  <a href="logout.php" class="logou">Logout</a>
  <a href="logout.php" class="logou"><?php echo "Hey 🙌 " . $_SESSION["Email"];?></a>
 
</div>

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
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


// Prepare a SELECT statement to retrieve the user's information
$stmt = $conn->prepare("SELECT COUNT(`customerID`) FROM customers");
$stmt2 = $conn->prepare("SELECT SUM(`amount`) FROM payment;");

// Execute the statement
$stmt->execute();
$stmt2->execute();

// Fetch the result
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$amount = $stmt2->fetch(PDO::FETCH_ASSOC);


?>
      
<h1>All Customers:<?php echo $user['COUNT(`customerID`)']?></h1>
<h1>Total Amount:<?php echo $amount['SUM(`amount`)']?></h1>

  </body>
</html>
