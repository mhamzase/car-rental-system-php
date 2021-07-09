<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include "database/connection.php";

if (isset($_SESSION['loggedIn'])) {

  $session_email = $_SESSION['loggedIn'];

  $user_query = "SELECT * FROM users WHERE email = '$session_email'";
  $user_result = mysqli_query($conn, $user_query);

  $user_data = mysqli_fetch_assoc($user_result);
  $db_type = $user_data['type'];

  if ($dp_type == 0) {
    header("Location: admin-dashboard.php");
  }
  if ($db_type == 1) {
    header("Location: index.php");
  }
}

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM users WHERE email = '$email'";

  $result = mysqli_query($conn, $sql);
  $isUser = mysqli_num_rows($result);

  if ($isUser) {
    $user_data = mysqli_fetch_assoc($result);

    $db_password = $user_data['password'];
    // $password_check = password_verify($password, $db_password);

    if ($password === $db_password) {

      $type = $user_data['type'];

      if ($type == 0) {
        $_SESSION["loggedIn"] = $email;
        header("Location: admin-dashboard.php");
      } else {
        $_SESSION["loggedIn"] = $email;
        header("Location:index.php");
      }
    } else {
      header("Location:login.php?error= username or password incorrect !");
    }
  } else {
    header("Location:login.php?error= username or password incorrect !");
  }
}


mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">


  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>
  <?php include 'includes/header.php' ?>

  <!-- Page Content -->
  <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Safe and Secure Drive</h4>
            <h2>LOGIN</h2>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Login</h2>
          </div>
        </div>
        <div class="float-left">
          <div class="col-md-12">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php
                    if (isset($_GET['success'])) {
                    ?>
                      <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success'] ?>


                      </div>
                    <?php
                    }

                    if (isset($_GET['error'])) {
                    ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error'] ?>


                      </div>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="password" type="password" class="form-control" id="password" placeholder="Password" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name="login" id="form-submit" class="filled-button">Login to your account</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>



  <?php include 'includes/footer.php' ?>


</body>

</html>