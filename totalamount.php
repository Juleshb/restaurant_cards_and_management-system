<?php
include "nav.php";
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "habarurema_jules_221003981";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Prepare and execute SELECT query
$stmt = $conn->prepare("SELECT * FROM customers WHERE customerID = :id");
$stmt2 = $conn->prepare("SELECT SUM(`amount`) FROM payment where customerID = :id");

// bind the parameter values
$stmt->bindParam(':id', $_POST['id']);
$stmt2->bindParam(':id', $_POST['id']);
$stmt->execute();
$stmt2->execute();

// Populate input field with data
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

?>

<html>
  <head>
    <link rel="stylesheet" href="from.css">
   <title>Update</title>
  </head>
  <body>

  
    <!-- HTML form -->
    <div class="form-container" >
      <form id="contact-form" method="post" >
        <div class="form-group">
          <label for="name">Names:</label>
          <input
            type="text"
            id="names"
            name="names"
            class="form-control"
            value="<?php echo $row['names'];?>"
           
          />
          <span class="error" id="nameError"></span>
        </div>
        <div class="form-group">
          <label for="email">Total Paid Amount</label>
          <input
            type="number"
            id="phone"
            name="phone"
            class="form-control"
            value="<?php echo $row2['SUM(`amount`)']?>"
            
          />
          <span class="error" id="emailError"></span>
        </div>
        
      </form>
    </div>
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