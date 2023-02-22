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
    <h2 id="animateHeading">Pay amount customer amount</h2>
    <div class="form-container" >
      <form id="contact-form" action="pay.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
        <label for="name">Customer ID:</label>
          
        <select id="u_role" name="id">
        <?php 
$sql = "SELECT * FROM `customers`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      
  
      ?>
          <option value="<?php echo $row['customerID']?>"><?php echo $row['customerID']?></option>
          <?php 
      }
    } else {
      echo "0 results";
    }
      ?>
          </select>
          </div>

        <div class="form-group">
          <label for="email">Amount:</label>
          <input
            type="number"
            id="phone"
            name="amount"
            class="form-control"/>

          <span class="error" id="phonelError"></span>
        </div>
        
        
        <button type="submit">Pay</button>
      </form>
    </div>

    <!-- JavaScript for form validation -->
    <script>
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