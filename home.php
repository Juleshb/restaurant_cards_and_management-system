
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
$stmt = $conn->prepare("SELECT COUNT(`customerID`) FROM customers");
$stmt2 = $conn->prepare("SELECT SUM(`amount`) FROM payment;");

// Execute the statement
$stmt->execute();
$stmt2->execute();

// Fetch the result
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$amount = $stmt2->fetch(PDO::FETCH_ASSOC);


?>


<div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="assets/images/about-left-image.png" alt="Two Girls working together">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Grow your website with our <em>SEO Tools</em> &amp; <span>Project</span> Management</h2>
            <p>You can browse free HTML templates on Too CSS website. Visit the website and explore latest website templates for your projects.</p>
            <div class="row">
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-01.png" alt="">
                    </div>
                    <div class="count-digit"><?php echo $user['COUNT(`customerID`)']?></div>
                    <div class="count-title">Total customers</div>
                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-02.png" alt="">
                    </div>
                    <div class="count-digit">640</div>
                    <div class="count-title">Websites</div>
                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-03.png" alt="">
                    </div>
                    <div class="count-digit"><?php echo $amount['SUM(`amount`)']?></div>
                    <div class="count-title">Total Amount</div>
                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="owl-carousel owl-banner">
                <div class="item header-text">
                  <h6>Welcome to Onix Digital</h6>
                  <h2>Build <em>your website</em> the best in <span>SEO</span>?</h2>
                  <p>This is a professional looking HTML Bootstrap 5 website template brought to you by TemplateMo website.</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#contact">Message Us Now</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 010-020-0340</a>
                    </div>
                  </div>
                </div>
                <div class="item header-text">
                  <h6>Online Marketing</h6>
                  <h2>Get the <em>best ideas</em> for <span>your website</span></h2>
                  <p>You are NOT allowed to redistribute this template ZIP file on any Free CSS collection websites. Contact us for more info. Thank you.</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#services">Our Services</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 090-080-0760</a>
                    </div>
                  </div>
                </div>
                <div class="item header-text">
                  <h6>Video Tutorials</h6>
                  <h2>Watch <em>our videos</em> for your <span>projects</span></h2>
                  <p>Please <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little via PayPal if this digital marketing HTML template is useful for you. Thank you.</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#video">Watch Videos</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 050-040-0320</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="our-services section">
    <div class="services-right-dec">
      <img src="assets/images/services-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="services-left-dec">
        <img src="assets/images/services-left-dec.png" alt="">
      </div>
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>We <em>Provide</em> The Best Service With <span>Our Tools</span></h2>
            <span>Our Services</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-services">
            <div class="item">
              <h4>Learn More about our Guidelines</h4>
              <div class="icon"><img src="assets/images/service-icon-01.png" alt=""></div>
              <p>Feel free to use this template for your business</p>
            </div>
            <div class="item">
              <h4>Develop The Best Strategy for Business</h4>
              <div class="icon"><img src="assets/images/service-icon-02.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>UI / UX Design and Development</h4>
              <div class="icon"><img src="assets/images/service-icon-03.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Discover &amp; Explore our SEO Tips</h4>
              <div class="icon"><img src="assets/images/service-icon-04.png" alt=""></div>
              <p>Feel free to use this template for your business</p>
            </div>
            <div class="item">
              <h4>Optimizing your websites for Speed</h4>
              <div class="icon"><img src="assets/images/service-icon-01.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>See The Strategy In The Market</h4>
              <div class="icon"><img src="assets/images/service-icon-02.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Best Content Ideas for your pages</h4>
              <div class="icon"><img src="assets/images/service-icon-03.png" alt=""></div>
              <p>Feel free to use this template for your business</p>
            </div>
            <div class="item">
              <h4>Optimizing Speed for your web pages</h4>
              <div class="icon"><img src="assets/images/service-icon-04.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Accessibility for mobile viewing</h4>
              <div class="icon"><img src="assets/images/service-icon-01.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Content Ideas for your next project</h4>
              <div class="icon"><img src="assets/images/service-icon-02.png" alt=""></div>
              <p>Feel free to use this template for your business</p>
            </div>
            <div class="item">
              <h4>UI &amp; UX Design &amp; Development</h4>
              <div class="icon"><img src="assets/images/service-icon-03.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Discover the digital marketing trend</h4>
              <div class="icon"><img src="assets/images/service-icon-04.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
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



