
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
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


// Prepare a SELECT statement to retrieve the user's information

$stmt = $conn->prepare("SELECT SUM(`amount`) FROM customeraccount WHERE customerID=$id;");
$stmt2 = $conn->prepare("SELECT SUM(`amount`) FROM payment WHERE customerID=$id;");
$stmt3 = $conn->prepare("SELECT SUM(`amount`) FROM transaction WHERE customerID=$id;");


// Execute the statement
$stmt->execute();
$stmt2->execute();
$stmt3->execute();

// Fetch the result
$Cash = $stmt->fetch(PDO::FETCH_ASSOC);
$cashin = $stmt2->fetch(PDO::FETCH_ASSOC);
$cashout = $stmt3->fetch(PDO::FETCH_ASSOC);

?>


<div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="about-left-image.png" alt="Two Girls working together">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
          <h2>RESTAURANT <em> CARDS </em> &amp; <span> MANAGEMENT </span> SYSTEM  <em> (IGIFU) </em></h2>
          <div class="main-red-button-hover"><a href="makepayment.php">Pay fro Food</a></div></h2>
            <p>The customer side allows the customer to view their money (the money paid, the money used, and their current money).</p>
            
            <div class="row">
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-01.png" alt="">
                    </div>
                    <div class="count-digit"><?php echo $cashin['SUM(`amount`)']?></div>
                    <div class="count-title">Cash in</div>
                    <p>Deposte cashes.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-02.png" alt="">
                    </div>
                    <div class="count-digit"><?php echo $cashout['SUM(`amount`)']?></div>
                    <div class="count-title">Cash out</div>
                    <p>Used cashes.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-03.png" alt="">
                    </div>
                    <div class="count-digit"><?php echo $Cash ['SUM(`amount`)']?></div>
                    <div class="count-title">Balance</div>
                    <p>unused amount.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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



