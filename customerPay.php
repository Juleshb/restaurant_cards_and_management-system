<?php

// Connect to the database (replace the variables with your own database credentials)
$db_host = 'localhost';
$db_name = 'habarurema_jules_221003981';
$db_user = 'root';
$db_pass = '';
$db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

// Validate and sanitize the user input (replace these variables with your own)
$user_id = 1234;
$amount = 100.00;

// Insert a new row into the transactions table
$stmt = $db_conn->prepare("INSERT INTO transaction (customerID, amount) VALUES (?, ?)");
$stmt->execute([$user_id, $amount]);
$transaction_id = $db_conn->lastInsertId();

// Update the account balance for the user
$stmt = $db_conn->prepare("UPDATE accounts SET balance = balance - ? WHERE user_id = ?");
$stmt->execute([$amount, $user_id]);

// Output a success message to the user
echo "Cash out of $amount successfully recorded with transaction ID $transaction_id.";

?>
