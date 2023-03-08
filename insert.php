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

$names= $_POST["names"];
$phone = $_POST["phone"];
$address= $_POST["address"];
$email = $_POST["email"];
$password= $_POST["password"];




$sql = "INSERT INTO `customers`(`names`, `phone`, `address`, `email`, `password`) VALUES('$names', '$phone','$address','$email','$password')";

if ($conn->query($sql) === TRUE) {
  $sql = "SELECT * FROM `customers` WHERE Email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      
    $id=$row["customerID"];
}
} else {
echo "0 results";
}

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<?php 

include "nav.php";

?>
<html>
  <head>
    <link rel="stylesheet" href="from.css">
   <title>Registe</title>
  </head>
  <body>
    <!-- HTML form -->
    <br><br><br><br>
    <h2 id="animateHeading">Pay amount customer amount</h2>
    <div class="form-container" >
      <form id="contact-form" action="add1.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
        <label for="name">Customer ID: <?php echo $id?></label>
          
        
          </div>

        <div class="form-group">
          <label for="email">Comfirm Account</label>
          <input type="hidden"
            id="phone"
            name="id"
            value ="<?php echo $id?>"
            class="form-control"/>
           

          <span class="error" id="phonelError"></span>
        </div>
        
        
        <button type="submit">Comfirm</button>
      </form>
    </div>

    <!-- JavaScript for form validation -->

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
