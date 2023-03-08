

<?php

// Connect to the database (replace the variables with your own database credentials)
$db_host = 'localhost';
$db_name = 'habarurema_jules_221003981';
$db_user = 'root';
$db_pass = '';
$db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

// Validate and sanitize the user input (replace these variables with your own)
$id= $_POST["id"];
$amount = $_POST["amount"];

// Insert a new row into the transactions table
$stmt = $db_conn->prepare("INSERT INTO transaction (customerID, amount) VALUES (?, ?)");
$stmt->execute([$id, $amount]);
$transaction_id = $db_conn->lastInsertId();

// Update the account balance for the user
$stmt = $db_conn->prepare("UPDATE customeraccount SET amount = amount - ? WHERE customerID= ?");
$stmt->execute([$amount, $id]);

// Output a success message to the user
header("Location: home.php");

?>

