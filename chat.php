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
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Table Example</title>
  <style>
    /* Set default font size and margin/padding to 0 */
    body {
      font-size: 16px;
      margin: 0;
      padding: 0;
    }
    
    /* Style the table */
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    /* Style the table header */
    th {
      background-color: #f2f2f2;
      text-align: left;
      padding: 8px;
    }
    
    /* Style the table cells */
    td {
      border: 1px solid #ddd;
      text-align: left;
      padding: 8px;
    }
    
    /* Hide table cell content when screen is too small */
    @media only screen and (max-width: 600px) {
      td:nth-of-type(1):before { content: "Names: "; }
      td:nth-of-type(2):before { content: "Adress: "; }
      td:nth-of-type(3):before { content: "Phone: "; }
      td:nth-of-type(4):before { content: "Registed date: "; }
      td:nth-of-type(5):before { content: "Email: "; }
      td:nth-of-type(6):before { content: "options: "; }
    }
  </style>
</head>
<body>
  <br>
  <br>
  <br>
  <br>
   <br>
   <a href="register.php"  >Add new customer</a>
<div class="container">
  <table>
    <thead>
      <tr>
      <th>ID</th>
        <th>Names</th>
        <th>Adress</th>
        <th>Phone</th>
        <th>Registed date</th>
        <th>Email</th>
        <th>options</th>
      </tr>
    </thead>
    <tbody>
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
    </tbody>
  </table>
  <!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
  // Acc
    $(document).on("click", ".naccs .menu div", function() {
      var numberIndex = $(this).index();

      if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
    });
  </script>
</body>
</html>
