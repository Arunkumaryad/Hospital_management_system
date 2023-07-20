<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Dashboard</title>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/75e668eaf0.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

    <link rel="googleapis" href="https://www.google.com">
    <link rel="youtube" href="https://www.youtube.com/watchtv">
</head>
<body>
    <?php 
    include('../HMS/includes/header.php');
    ?>
    <div class="container-fluid">
        <div class="ccol-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include('patient_sidenav.php');
                    include('../HMS/includes/connection.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="my-3">Patient Dashboard</h5>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-3 bg-info mx-2" style="height:150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">My Profile</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#">
                                                    <i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 bg-warning mx-2" style="height:150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">Book Appointment</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#">
                                                    <i class="fa fa-calendar fa-3x my-4" style="color:white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 bg-success mx-2" style="height:150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">My Invoice</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#">
                                                    <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color:white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    if(isset($_POST['send'])){
                        $title = $_POST['title'];
                        $message = $_POST['message'];

                        if(empty($title)){
                            // Handle empty title
                        } else if(empty($message)) {
                            // Handle empty message
                        } else {
                            $user = $_SESSION['patient'];

                            // Prepare the SQL statement
                            $query = "INSERT INTO report (title, message, username, date_send) VALUES (:title, :message, :username, NOW())";
                            $stmt = $connection->prepare($query);

                            // Bind the parameters
                            $stmt->bindParam(':title', $title);
                            $stmt->bindParam(':message', $message);
                            $stmt->bindParam(':username', $user);

                            // Execute the query
                            if($stmt->execute()){
                                echo "<script>alert('You have sent your report')</script>";
                            }
                        }
                    }
                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron bg-info my-5">
                                <h5 class="text-center my-2">Send A Report</h5>
                                <form method="post">
                                    <label>Title</label>
                                    <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the Report">
                                    <label>Message</label>
                                    <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message">
                                    <input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
