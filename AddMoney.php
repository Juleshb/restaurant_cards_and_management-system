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
      <form id="contact-form" action="pay.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
        <label for="name">Customer ID: <?php echo $id?></label>
          
        
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