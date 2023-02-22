

<?php 

include "nav.php";

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

?>
<br>
<br><br>
<a href="makepayment.php"  >new Payment</a>
<div class="container">

<table>
      <tr>
        <th>ID</th>
        <th>Names</th>
        <th>Email</th>
        <TH>AMOUNT</TH>
        <th>options</th>
        
        
      </tr>

      <?php 
$sql = "SELECT customers.customerID,customers.names,customers.email,payment.amount FROM customers INNER JOIN payment ON customers.customerID = payment.customerID ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      
  
      ?>
      <tr>
        <td><?php echo $row['customerID'] ?></td>
        <td><?php echo $row["names"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["amount"] ?></td>
        <td>
        <form method="post" action="totalamount.php"><input type="hidden" name="id" value="<?php echo $row['customerID']?>"><input type="submit" value="View total payment" ></form>
      </td>
      </tr>
      <?php 
      }
    } else {
      echo "0 results";
    }
      ?>
</table>
   
      
    </div>
  </body>
</html>