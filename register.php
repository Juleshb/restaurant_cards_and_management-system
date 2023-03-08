<?php 

include "nav.php";
?>

    <link rel="stylesheet" href="from.css">
  
 
    <br><br><br><br>
    <h2 id="animateHeading">Register here..</h2>
    <div class="form-container" >
      <form id="contact-form" action="insert.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
        <label for="name">Names:</label>
          <input
            type="text"
            id="names"
            name="names"
            class="form-control"/>

          <span class="error" id="namesError"></span>
        </div>
        <div class="form-group">
          <label for="email">Phone:</label>
          <input
            type="number"
            id="phone"
            name="phone"
            class="form-control"/>

          <span class="error" id="phonelError"></span>
        </div>
        <div class="form-group">
            <label for="email">Address:</label>
            <input
              type="text"
              id="address"
              name="address"
              class="form-control"/>

            <span class="error" id="addressError"></span>
          </div>
          <div class="form-group">
            <label for="email">Password:</label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-control"/>

            <span class="error" id="passwordError"></span>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"/>
            <span class="error" id="emailError"></span>
          </div>
        
        
        <button type="submit">Submit</button>
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
    <script>
        function validateForm() {
          var names = document.getElementById("names").value;
          var email = document.getElementById("email").value;
          var phone = document.getElementById("phone").value;
          var address = document.getElementById("address").value;
          var password = document.getElementById("password").value;

        var namesError = document.getElementById("namesError");
        var phonelError = document.getElementById("phonelError");
        var addressError = document.getElementById("addressError");
        var passwordError = document.getElementById("passwordError");
        var emailError = document.getElementById("emailError");
        var valid = true;
        
        namesError.innerHTML = "";
        phonelError.innerHTML = "";
        addressError.innerHTML = "";
        passwordError.innerHTML = "";
        emailError.innerHTML = "";
          
        if (!names) {
          namesError.innerHTML = "your names is required";
          valid = false;
        }
        if (!email) {
          emailError.innerHTML = "Email is required";
          valid = false;
        } else if (!email.includes("@")) {
          emailError.innerHTML = "collect your Email";
          valid = false;
        }
        if (!phone) {
          phonelError.innerHTML = "Phone number is required";
          valid = false;
        }
        if (!address) {
          addressError.innerHTML = "Adress is required";
          valid = false;
        }
        if (!password ) {
          passwordError.innerHTML = "Password is required";
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