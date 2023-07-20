<?php
session_start();
include('../HMS/includes/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
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
                    include('sidenav.php');
                    ?>
                </div>
                <div class="col-md-10 ">
                    <h4 class="my-2">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $stmt = $connection->prepare("SELECT COUNT(*) as count FROM admin");
                                            $stmt->execute();
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $count = $row['count'];
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $count; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="admin.php"><i class="fas fa-users-cog fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $stmt = $connection->prepare("SELECT COUNT(*) as count FROM doctors");
                                            $stmt->execute();
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $count = $row['count'];
                                            ?>
                                            <h5 class="my-2 text-white " style="font-size:30px;"><?php echo $count; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="doctor.php"><i class="fas fa-user-doctor fa-3x my-4" style="color:white;"></i></a>
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
                                            <a href="admin_patient.php"><i class="fas fa-bed-pulse fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white " style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Report</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fas fa-flag fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php
                                            $stmt = $connection->prepare("SELECT COUNT(*) as count FROM doctors WHERE status = ''");
                                            $stmt->execute();
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $countPending = $row['count'];

                                            $stmtApproved = $connection->prepare("SELECT COUNT(*) as count FROM doctors WHERE status = 'approved'");
                                            $stmtApproved->execute();
                                            $rowApproved = $stmtApproved->fetch(PDO::FETCH_ASSOC);
                                            $countApproved = $rowApproved['count'];

                                            $stmtRejected = $connection->prepare("SELECT COUNT(*) as count FROM doctors WHERE status = 'rejected'");
                                            $stmtRejected->execute();
                                            $rowRejected = $stmtRejected->fetch(PDO::FETCH_ASSOC);
                                            $countRejected = $rowRejected['count'];
                                            ?>
                                            <div class="column">
                                                <h6 class="text-white">Total Job Request: <?php echo $countPending; ?></h6>
                                                <h6 class="text-white">Approved: <?php echo $countApproved; ?></h6>
                                                <h6 class="text-white">Rejected: <?php echo $countRejected; ?></h6>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="job_request.php"><i class="fas fa-book-open fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2 my-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white " style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fas fa-money-check-alt fa-3x my-4" style="color:white;"></i></a>
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