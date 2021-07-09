<?php
session_start();
include "database/connection.php";


// update a chapter
if (isset($_POST['updateOffer'])) {

    $update_offer_id = mysqli_real_escape_string($conn, $_POST['update_offer_id']);
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_rent = mysqli_real_escape_string($conn, $_POST['update_rent']);
    $update_description = mysqli_real_escape_string($conn, $_POST['update_description']);


    $var1 = rand(111, 999);  // generate random number in $var1 variable
    $var2 = md5($var1);     // convert $var3 using md5 function and generate 32 characters hex number

    $target_dir = "images/";
    $target_file = $target_dir . $var2 . "." . basename($_FILES["update_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Allow pdf file format
    if ($_FILES['update_photo']['name'] != "") {

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

            header("Location: admin-dashboard.php?error=Sorry, only JPG, JPEG and PNG  files are allowed.");
        } else {
            if (move_uploaded_file($_FILES["update_photo"]["tmp_name"], $target_file)) {

                $query = mysqli_query($conn, "SELECT * FROM offers WHERE id = '$update_offer_id'");
                $fetch = mysqli_fetch_assoc($query);
                $photo = $fetch['photo'];

                unlink($photo);


                $sql_update = mysqli_query($conn, "UPDATE offers SET name = '$update_name',rent_per_day = '$update_rent',description = '$update_description' , photo = '$target_file' WHERE id = '$update_offer_id'");
            }
        }
    } else {
       
        $sql_update = mysqli_query($conn, "UPDATE offers SET name = '$update_name',rent_per_day = '$update_rent',description = '$update_description' WHERE id = '$update_offer_id'");
    }

    header("Location: admin-dashboard.php");
}



// delete an offer
if (isset($_POST['delete'])) {

    $offer_id = mysqli_real_escape_string($conn, $_POST['offer_id']);

    $query = mysqli_query($conn, "SELECT * FROM offers WHERE id = '$offer_id'");
    $fetch = mysqli_fetch_assoc($query);
    $photo = $fetch['photo'];

    unlink($photo);

    $sql = mysqli_query($conn, "DELETE FROM offers WHERE id = '$offer_id'");

    header("Location: admin-dashboard.php");
}



// add an offer
if (isset($_POST['addoffer'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rent = mysqli_real_escape_string($conn, $_POST['rent']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);


    $var1 = rand(111, 999);  // generate random number in $var1 variable
    $var2 = md5($var1);     // convert $var3 using md5 function and generate 32 characters hex number

    $target_dir = "images/";
    $target_file = $target_dir . $var2 . "." . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    // Allow pdf file format
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

        header("Location: admin-dashboard.php?error=Sorry, only JPG, JPEG and PNG  files are allowed.");
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {

            $sql = "INSERT INTO `offers` (`name`,`rent_per_day`, `description`,`photo`) VALUES ('$name','$rent' , '$description','$target_file')";

            if (mysqli_query($conn, $sql)) {
                header("Location: admin-dashboard.php?success=Rent Offer added Successfully!");
            }
        }
    }
}


if (isset($_SESSION['loggedIn'])) {

    $session_email = $_SESSION['loggedIn'];

    $user_query = "SELECT * FROM users WHERE email = '$session_email'";
    $user_result = mysqli_query($conn, $user_query);

    $user_data = mysqli_fetch_assoc($user_result);
    $db_type = $user_data['type'];
    $user_id = $user_data['id'];

    if ($db_type == 0) {

?>



        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Admin | Dashboard</title>

            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">


            <!-- Bootstrap core CSS -->
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

            <!-- Additional CSS Files -->
            <link rel="stylesheet" href="assets/css/fontawesome.css">
            <link rel="stylesheet" href="assets/css/style.css">
            <link rel="stylesheet" href="assets/css/owl.css">

        </head>

        <body>
            <?php
            include 'includes/header.php';
            ?>
            <br /><br /><br /><br /><br /><br />
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-heading">
                            <h2>Add Car Rent Offer Details</h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form id="contact" action="" method="post" enctype="multipart/form-data">
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
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <fieldset>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Name" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <fieldset>
                                            <input name="rent" type="number" class="form-control" id="rent" placeholder="Rent Per Day (PKR)" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="description" maxlength="30" type="text" class="form-control" id="description" placeholder="Description - max length ( 30 char. )" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            Choose a photo
                                            <input name="photo" type="file" class="form-control" id="photo" required="" style="height: 65px;">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" name="addoffer" id="form-submit" class="filled-button col-md-12">Add Offer</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>




            <div class="container-fluid mt-5">
                <div class="col-md-12">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">SR#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Rent Per Day</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($conn, 'SELECT * FROM offers');
                            $count = 0;
                            while ($row =  mysqli_fetch_assoc($sql)) {
                                $count++;
                            ?>

                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><img src="<?php echo $row['photo'] ?>" alt="Car photo" width="70px"></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['rent_per_day'] ?></td>
                                    <td>

                                        <button onclick='fetchOfferId.call(this)' id='<?php echo $row['id']; ?>' value='<?php echo $row['name'] . "$$$" . $row['rent_per_day'] . "$$$" . $row['description'] . "$$$" . $row['photo']; ?>' data-toggle="modal" class="btn btn-primary  mt-1" data-target="#exampleModal">Edit</button>



                                        <form action="" method="post" onsubmit="return confirmDelete()" class="float-right mr-5">
                                            <input type="hidden" name="offer_id" value="<?php echo $row['id']; ?>">
                                            <button class="btn btn-danger mt-2" style="cursor:pointer" type="submit" name="delete">Delete</button>
                                        </form>

                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Offer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form">
                                <form action="" id="contact" method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <fieldset>
                                                <input name="update_name" type="text" class="form-control" id="update_name" placeholder="Name" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <fieldset>
                                                <input name="update_rent" type="number" class="form-control" id="update_rent" placeholder="Rent Per Day (PKR)" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <fieldset>
                                                <input name="update_description" maxlength="30" type="text" class="form-control" id="update_description" placeholder="Description - max length ( 30 char. )" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <fieldset>
                                                Choose a photo
                                                <input name="update_photo" type="file" class="form-control" id="update_photo" style="height: 65px;">
                                            </fieldset>
                                        </div>

                                    </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="update_offer_id" name="update_offer_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="updateOffer" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>






            <script>
                function confirmDelete() {
                    if (window.confirm("Are you sure?")) {
                        return true;
                    } else {
                        return false;
                    }
                }

                // fetching quiz id
                function fetchOfferId() {
                    let update_offer_id = document.getElementById("update_offer_id");

                    let update_name = document.getElementById("update_name");
                    let update_rent = document.getElementById("update_rent");
                    let update_description = document.getElementById("update_description");


                    let data = this.value.split("$$$");

                    update_name.value = data[0];
                    update_rent.value = data[1];
                    update_description.value = data[2];

                    update_offer_id.value = this.id;
                }
            </script>






            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


            <!-- Additional Scripts -->
            <script src="assets/js/custom.js"></script>
            <script src="assets/js/owl.js"></script>
        </body>

        </html>

<?php
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: login.php");
}
mysqli_close($conn);
?>