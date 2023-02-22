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

          <span class="error" id="nameError"></span>
        </div>
        <div class="form-group">
          <label for="email">Phone:</label>
          <input
            type="number"
            id="phone"
            name="phone"
            class="form-control"/>

          <span class="error" id="emailError"></span>
        </div>
        <div class="form-group">
            <label for="email">Address:</label>
            <input
              type="text"
              id="address"
              name="address"
              class="form-control"/>

            <span class="error" id="regnumberError"></span>
          </div>
          <div class="form-group">
            <label for="email">Password:</label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-control"/>

            <span class="error" id="regnumberError"></span>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"/>
          
        
        
        <button type="submit">Submit</button>
      </form>
    </div>

    <!-- JavaScript for form validation -->
    <script>
        function validateForm() {
          var name = document.getElementById("name").value;
          var email = document.getElementById("email").value;
          var regnumber = document.getElementById("regnumber").value;
          var sex = document.getElementById("sex").value;
          var clas = document.getElementById("class").value;

        var nameError = document.getElementById("nameError");
        var emailError = document.getElementById("emailError");
        var regnumberError = document.getElementById("regnumberError");
        var sexError = document.getElementById("sexError");
        var classError = document.getElementById("classError");
        var valid = true;
        
        nameError.innerHTML = "";
        emailError.innerHTML = "";
        regnumberError.innerHTML = "";
        sexError.innerHTML = "";
        classError.innerHTML = "";
          
        if (!name) {
          nameError.innerHTML = "Name is required";
          valid = false;
        }
        if (!email) {
          emailError.innerHTML = "Email is required";
          valid = false;
        } else if (!email.includes("@")) {
          emailError.innerHTML = "Email is invalid";
          valid = false;
        }
        if (!regnumber) {
          regnumberError.innerHTML = "Regnumber is required";
          valid = false;
        }
        if (!sex) {
          sexError.innerHTML = "Sex is required";
          valid = false;
        }
        if (!clas) {
        classError.innerHTML = "Class is required";
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