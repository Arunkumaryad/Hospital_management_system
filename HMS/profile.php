<?php
session_start();
include('../HMS/includes/header.php');
include('../HMS/includes/connection.php');

$ad = $_SESSION["AdminUsername"];

$query = "SELECT * FROM admin WHERE username = :username";
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
    <title>Admin Profile</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                    include('sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $username; ?> Profile</h4>
                                <?php
                                if (isset($_POST['update'])) {
                                    $profile = $_FILES['profile']['name'];
                                    if (empty($profile)) {
                                        // No image uploaded, do nothing
                                    } else {
                                        $query = "UPDATE admin SET photo = :photo WHERE username = :username";
                                        $statement = $connection->prepare($query);
                                        $statement->bindParam(':photo', $profile);
                                        $statement->bindParam(':username', $ad);
                                        $result = $statement->execute();
                                        if ($result) {
                                            move_uploaded_file($_FILES['profile']['tmp_name'], "../HMS/image/$profile");
                                            $profiles = $profile; // Update the $profiles variable with the new image name
                                        }
                                    }
                                }

                                ?>

                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                    echo "<img src='../HMS/image/$profiles' class='col-md-12' style='height:250px;'>";
                                    ?>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label>UPDATE PROFILE</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form method="post">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off" value="<?php echo $username; ?>"><br>
                                    <input type="submit" name="change" class="btn btn-success" value="Change">
                                </form>
                                <br>
                                <?php
                                if (isset($_POST['change'])) {
                                    $uname = $_POST['uname'];

                                    if (empty($uname)) {
                                        // Handle empty username case if needed
                                    } else {
                                        try {
                                            $query = "UPDATE admin SET username=:uname WHERE username=:ad";
                                            $stmt = $connection->prepare($query);
                                            $stmt->bindParam(':uname', $uname);
                                            $stmt->bindParam(':ad', $ad);
                                            $res = $stmt->execute();

                                            if ($res) {
                                                $_SESSION['AdminUsername'] = $uname;
                                                $username = $uname; // Update the $username variable with the new username
                                            }
                                        } catch (PDOException $e) {
                                            echo "Query failed: " . $e->getMessage();
                                        }
                                    }
                                }

                                $success = "";

                                if (isset($_POST['update_pass'])) {
                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_pass = $_POST['con_pass'];

                                    $error = array();

                                    // Retrieve the password from the database
                                    $query = "SELECT password FROM admin WHERE username = :username";
                                    $statement = $connection->prepare($query);
                                    $statement->bindParam(':username', $ad);
                                    $statement->execute();
                                    $row = $statement->fetch(PDO::FETCH_ASSOC);

                                    if (empty($old_pass)) {
                                        $error['p'] = "Enter old Password";
                                    } else if (empty($new_pass)) {
                                        $error['p'] = "Enter New Password";
                                    } else if (empty($con_pass)) {
                                        $error['p'] = "Confirm Password";
                                    } else if (trim($old_pass) !== trim($row['password'])) {
                                        $error['p'] = "Invalid Old Password";
                                    } else if ($new_pass != $con_pass) {
                                        $error['p'] = "Both passwords do not match";
                                    }

                                    if (count($error) == 0) {
                                        // Update the password in the database
                                        $query = "UPDATE admin SET password = :password WHERE username = :username";
                                        $statement = $connection->prepare($query);
                                        $statement->bindParam(':password', $new_pass);
                                        $statement->bindParam(':username', $ad);
                                        $statement->execute();

                                        // Clear the error message
                                        unset($error['p']);

                                        // Set the success message
                                        $success = "Password updated successfully!";
                                    }
                                }

                                // Unset the success message after refreshing the page...
                                if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                                    unset($success);
                                }

                                if (isset($error['p'])) {
                                    $e = $error['p'];
                                    $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                } else {
                                    $show = "";
                                }

                                ?>


                                <form method="post">
                                    <h5 class="text-center my-4">Change Password</h5>
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" name="update_pass" value="Update Password" class="btn btn-info">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>