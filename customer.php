

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
<a href="register.php"  >Add new customer</a>
<div class="container">

<table>
      <tr>
      <th>ID</th>
        <th>Names</th>
        <th>Adress</th>
        <th>Phone</th>
        <th>Registed date</th>
        <th>Email</th>
        <th>options</th>
        
        
      </tr>

      <?php 
$sql = "SELECT * FROM `customers`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      
  
      ?>
      <tr>
      <td><?php echo $row["customerID"] ?></td>
        <td><?php echo $row["names"] ?></td>
        <td><?php echo $row["address"] ?></td>
        <td><?php echo $row["phone"] ?></td>
        <td><?php echo $row["email"] ?></td>
        <td><?php echo $row["registedDate"] ?></td>
        <td><form method="post" action="delete.php"><input type="hidden" name="id" value="<?php echo $row['customerID']?>"><input type="submit" value="Delete" ></form>
        <form method="post" action="update.php"><input type="hidden" name="id" value="<?php echo $row['customerID']?>"><input type="submit" value="Update" ></form>
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