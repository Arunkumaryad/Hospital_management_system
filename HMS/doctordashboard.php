<?php
session_start();
include('../HMS/includes/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -20px;">
                    <?php
                    include('doctor_sidenav.php');
                    ?>
                </div>
                <div class="col-md-10 ">
                    <h4 class="my-2">Doctor's Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-info mx-2" style="height:130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white " style="font-size:30px;"></h5>
                                            <h5 class="text-white my-4">My Profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="doctorsProfile.php"><i class="fas fa-user-circle fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $stmt = $connection->prepare("SELECT COUNT(*) as count FROM patient");
                                            $stmt->execute();
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $count = $row['count'];
                                            ?>
                                            <h5 class="my-2 text-white " style="font-size:30px;"><?php echo $count; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patient</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fas fa-bed-pulse fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white " style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Appointment</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fas fa-calendar-check fa-3x my-4" style="color:white;"></i></a>
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
</body>
</html>