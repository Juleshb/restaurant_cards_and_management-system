<?php
// create a new PDO object
$pdo = new PDO('mysql:host=localhost;dbname=habarurema_jules_221003981', 'root', '');

// prepare the DELETE statement
$statement = $pdo->prepare('DELETE FROM customers WHERE customerID  = :id');

// bind the parameter values
$statement->bindParam(':id', $_POST['id']);

// execute the statement
$statement->execute();
header("Location: customer.php");

?>