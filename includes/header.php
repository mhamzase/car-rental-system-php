<?php
if (!isset($_SESSION)) {
  session_start();
}

include "database/connection.php";
if (isset($_SESSION['loggedIn'])) {

  $session_email = $_SESSION['loggedIn'];

  $user_query = "SELECT * FROM users WHERE email = '$session_email'";
  $user_result = mysqli_query($conn, $user_query);

  $user_data = mysqli_fetch_assoc($user_result);
  $db_type = $user_data['type'];
}

if (isset($_POST['logout'])) {

  session_destroy();
  header("Location: login.php");
}

?>


<!-- Header -->
<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="">
        <h2>Car Rental <em>System</em></h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <?php
          if (isset($_SESSION['loggedIn'])) {

            $sql_user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$_SESSION[loggedIn]'");
            $fetch_data = mysqli_fetch_assoc($sql_user);
            if ($fetch_data['type'] == 1) {
          ?>
              <li class="nav-item active">
                <a class="nav-link" href="/car-rental-system">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item"><a class="nav-link" href="offers.php">Offers</a></li>

              <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>

              <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>

            <?php
            }else{
              ?>
              <li class="nav-item"><a class="nav-link" href=""><?php echo $fetch_data['fullname'];?></a></li>
                <?php
            }
          } else{
            ?>

            <li class="nav-item active">
              <a class="nav-link" href="/car-rental-system">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item"><a class="nav-link" href="offers.php">Offers</a></li>

            <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>

            <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>


          <?php
          }

          if (isset($_SESSION['loggedIn'])) {
          ?>
            <form action="" method="post">

              <button class="btn btn-danger mt-2" style="cursor:pointer" type="submit" name="logout">Logout</button>

            </form>

          <?php
          } else {
          ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
          <?php
          }




          ?>


        </ul>
      </div>
    </div>
  </nav>
</header>