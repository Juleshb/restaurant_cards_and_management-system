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

// bind the parameter values
$stmt->bindParam(':id', $id);

$stmt->execute();

// Populate input field with data
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<html>
  <head>
    <link rel="stylesheet" href="from.css">
   <title>Update</title>
  </head>
  <body>

  <br>
  <br><br><br><br>
    <!-- HTML form -->
    <h2 id="animateHeading">Uppdate <?php echo $row['names']?>'s infromation </h2>
    <div class="form-container" >
      <form id="contact-form" action="update1.php" method="post" >
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
          <label for="email">Phone:</label>
          <input
            type="number"
            id="phone"
            name="phone"
            class="form-control"
            value="<?php echo $row['phone']?>"
            
          />
          <span class="error" id="emailError"></span>
        </div>
        <div class="form-group">
            <label for="email">Address:</label>
            <input
              type="text"
              id="address"
              name="address"
              class="form-control"
              value="<?php echo $row['address']?>"
              
            />
            <span class="error" id="regnumberError"></span>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              value="<?php echo $row['Email']?>"
             
            />
            
        
        <input type="hidden" name="id" value="<?php echo $row['customerID']?>">
        <button type="submit">Uppdatte</button>
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