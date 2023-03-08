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
<html>
  <head>
    <link rel="stylesheet" href="from.css">
   <title>Registe</title>
  </head>
  <body>
    <!-- HTML form -->
    <br><br><br><br>
    <h2 id="animateHeading">chose kind of meal you want</h2>
    <div class="form-container" >
      <form id="contact-form" action="pay.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
        <label for="name">Customer ID:</label>
          
          <input
            type="number"
            id="phone"
            name="id"
            class="form-control"
            value="<?php echo$id?>"/>
            

          <span class="error" id="phonelError"></span>
        </div>
         
        <label for="name">Select amount:</label> 
        <select id="u_role" name="amount">
        <?php 
$sql = "SELECT * FROM `amount`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      
  
      ?>
          <option value="<?php echo $row['amount']?>"><?php echo $row['amount']?></option>
          <?php 
      }
    } else {
      echo "0 results";
    }
      ?>
          </select>
         
        
        
        <button type="submit">Pay</button>
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
 
        function validateForm() {
          var names = document.getElementById("names").value;
          var email = document.getElementById("email").value;
         

        var namesError = document.getElementById("namesError");
        var phonelError = document.getElementById("phonelError");
       
        var valid = true;
        
        namesError.innerHTML = "";
        phonelError.innerHTML = "";
        
          
        if (!names) {
          namesError.innerHTML = "ID is required";
          valid = false;
        }
       
        if (!phone) {
          phonelError.innerHTML = "Amount is required";
          valid = false;
        }
        
        //   if (valid= false){
        //     alert("Please fill requid fild")
        //   }
          return valid;
        }
      </script>
</body>
</html>