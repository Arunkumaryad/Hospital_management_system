<?php
session_start();
include('../HMS/includes/header.php');
include('../HMS/includes/connection.php');

$ad = $_SESSION["DoctorUsername"];

$query = "SELECT * FROM doctors WHERE username = :username";
$statement = $connection->prepare($query);
$statement->bindParam(':username', $ad);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $username = $row['username'];
    $profiles = $row['photo'];
}

// Unset the success message after refreshing the page...
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    unset($success);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctors Profile Page</title>
</head>

<body>


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include('doctor_sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $doc = $_SESSION['DoctorId'];
                                    $query = "SELECT * FROM doctors WHERE username=:username";
                                    $stmt = $connection->prepare($query);
                                    $stmt->bindParam(':username', $doc);
                                    $stmt->execute();
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <div class="my-5">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="2" class="text-center">Details</th>
                                            </tr>
                                            <tr>
                                                <td>Firstname</td>
                                                <td><?php echo $_SESSION['DoctorFirstName']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center my-2">Change Username</h5>
                                    <form method="post">
                                        <label>Change Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username" value="<?php echo $username; ?>">
                                        <br>
                                        <input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
                                    </form>
                                    <br><br>

                                    <h5 class="text-center my-2">Change Password</h5>
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                                        </div>
                                        <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
                                    </form>
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
