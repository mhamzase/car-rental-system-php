<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Car Rental System</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <?php include 'includes/header.php' ?>

  <!-- Page Content -->

  <!-- Banner Starts Here -->
  <div class="banner header-text ">
    <div class="owl-banner owl-carousel">
      <div class="banner-item-01">
        <div class="text-content">
          <h4>GET A RIDE!</h4>
          <h2>Find The Best Car For You :)</h2>
        </div>
      </div>
      <div class="banner-item-02">
        <div class="text-content">
          <h4>GET A RIDE!</h4>
          <h2>We Have More Cars For You To Choose :)</h2>
        </div>
      </div>
      <div class="banner-item-03">
        <div class="text-content">
          <h4>GET A RIDE!</h4>
          <h2>Get The Ideal One :)</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->
  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Offers</h2>
            <a href="offers.php">view more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM offers ORDER BY RAND() LIMIT 3");

        while ($row = mysqli_fetch_assoc($sql)) {
        ?>
          <div class="col-md-4">
            <div class="product-item">
              <img src="<?php echo $row['photo']; ?>" width="370" height="270" alt="">

              <div class="down-content">
                <h4><?php echo $row['name']; ?></h4>

                <h6><small>from</small> <?php echo $row['rent_per_day']; ?> Pkr <small>per Day</small></h6>

                <p><?php echo $row['description']; ?></p>

                <small>
                  <strong title="passegengers"><i class="fa fa-user"></i> 5</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="luggages"><i class="fa fa-briefcase"></i> 4</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="doors"><i class="fa fa-sign-out"></i> 4</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                  <strong title="transmission"><i class="fa fa-cog"></i> A</strong>
                </small>


              </div>
            </div>
          </div>


        <?php
        }

        ?>
      </div>
    </div>
  </div>
  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>About Us</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <p>We offer a varied fleet of cars, ranging from the compact Toyota Yaris to the 8-seater VW Multivan. All our vehicles have air conditioning, power steering, electric windows. All our vehicles are bought and maintained at official dealerships only. Automatic transmission cars are available in every booking class.</p>
            <ul class="featured-list">
              <li><a>this will give you better flexibility in terms of vehicle choices;</a></li>
              <li><a>you can book “commission free”;</a></li>
              <li><a>you can reach us 24/7 on our mobile numbers;</a></li>
              <li><a>you can call us free from the “Free call” service on our website;</a></li>
            </ul>
            <a href="about-us.html" class="filled-button">Read More</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-image">
            <img src="assets/images/about-1-570x350.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest blog posts</h2>

            <a href="blog.html">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <a href="#" class="services-item-image"><img src="assets/images/blog-1-370x270.jpg" class="img-fluid" alt=""></a>

            <div class="down-content">
              <h4><a href="#">Join me on my mental and physical race through life into Sundaystrolling mode.</a></h4>

              <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <a href="#" class="services-item-image"><img src="assets/images/blog-2-370x270.jpg" class="img-fluid" alt=""></a>

            <div class="down-content">
              <h4><a href="#">Hitch a ride for a grown-up version of running away from home.</a></h4>

              <p style="margin: 0;"> Jane Smith &nbsp;&nbsp;|&nbsp;&nbsp; 13/05/2020 12:30 &nbsp;&nbsp;|&nbsp;&nbsp; 115</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <a href="#" class="services-item-image"><img src="assets/images/blog-3-370x270.jpg" class="img-fluid" alt=""></a>

            <div class="down-content">
              <h4><a href="#">Road tripping is one of the best ways to get to travel take great photographs</a></h4>

              <p style="margin: 0;"> Antony Davis &nbsp;&nbsp;|&nbsp;&nbsp; 11/04/2020 11:30 &nbsp;&nbsp;|&nbsp;&nbsp; 116</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="happy-clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Happy Clients</h2>

            <a href="testimonials.html">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-clients owl-carousel text-center">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>John Doe</h4>
                <p class="n-m"><em>"Everything was good with my trip, i am very glad that i booked car from your car rental system for my first time and sure wont be the last cause is very easy to take return the car"</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Jane Smith</h4>
                <p class="n-m"><em>"All went very smoothly both during booking, pick up and return of the car fortunately there was no need of any kind of special assistance during the trip"</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Antony Davis</h4>
                <p class="n-m"><em>"Nick the agent i was emailing and called to book the car with was fantastic excellent reassuring customer service if he worked for my company i'd be figuring out how to keep him promote"</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Daniel Haslam</h4>
                <p class="n-m"><em>"Despite severe delays and frustrations with my finance company, The Car rental Company made all things better."</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Stephen</h4>
                <p class="n-m"><em>"Great experience at the car rental group, Adam my sales manager was very helpfull and made my time there an easy and enjoyable one. "</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Willemse</h4>
                <p class="n-m"><em>"My experience with the car rental company was absolutely great , very polite and friendly service."</em></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-md-8">
                <h4>The latest addition to the fleet:</h4>
                <p>Toyota Camry 2019 - 1,3 Petrol, Automatic Transmission, AC, electric windows, multi-function steering wheel</p>

                <p>Toyota Yaris 2019 - 1,5 Petrol, Automatic Transmission, AC, electric windows, rear view camera, alloy wheels, multi-function steering wheel, auto day light, aux/usb</p>
              </div>
              <div class="col-lg-4 col-md-6 text-right">
                <a href="contact.php" class="filled-button">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php' ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
</body>

</html>