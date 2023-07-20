<?php
session_start();
include('../HMS/includes/header.php');
include('../HMS/includes/connection.php');

// Check if the user is logged in as admin
if (!isset($_SESSION["AdminUsername"])) {
    // Redirect to login page or show an error message
    header("Location: login.php");
    exit();
}

// Fetch all admins
$query = "SELECT * FROM admin";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// Check if query execution was successful
if ($result === false) {
    // Handle the error, such as displaying an error message or redirecting
    // For simplicity, let's assume an error message is displayed
    echo "Failed to fetch admins. Please try again later.";
    exit();
}

// Delete admin if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM admin WHERE id = :id";
    $statement = $connection->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();
}

// Add new admin
if (isset($_POST['add'])) {
    $error = array();

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $image = $_FILES['img']['name'];

    if (empty($uname)) {
        $error['u'] = "Enter Admin Username";
    } elseif (empty($pass)) {
        $error['p'] = "Enter Admin Password";
    } elseif (empty($image)) {
        $error['i'] = "Add Admin Picture";
    }

    if (is_array($error) && count($error) == 0) {
        $query = "INSERT INTO admin (username, password, photo) VALUES (:username, :password, :profile)";
        $statement = $connection->prepare($query);
        $statement->bindParam(':username', $uname);
        $statement->bindParam(':password', $pass);
        $statement->bindParam(':profile', $image);
        $result = $statement->execute();

        if ($result) {
            move_uploaded_file($_FILES['img']['tmp_name'], "../HMS/image/$image");
            header("Location: admin.php");
            exit();
        } else {
            // Handle database insertion error
            echo "Failed to add new admin. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php include('sidenav.php'); ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">All Admin</h5>
                                <?php
                                if (is_array($result) && count($result) < 1) {
                                    echo "<p>No New Admin</p>";
                                } elseif (is_array($result)) {
                                    echo "<table class='table table-bordered'>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th style='width:10%;'>Action</th>
                                        </tr>";
                                    foreach ($result as $row) {
                                        $id = $row['id'];
                                        $username = $row['username'];
                                        echo "<tr>
                                                <td>$id</td>
                                                <td>$username</td>
                                                <td>
                                                    <a href='admin?id=$id'><button id='$id' class='btn btn-danger remove'>Remove</button></a>
                                                </td>
                                            </tr>";
                                    }
                                    echo "</table>";
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Add Admin</h5>
                                <?php
                                if (isset($error['u'])) {
                                    echo "<h5 class='text-center alert alert-danger'>" . $error['u'] . "</h5>";
                                }
                                ?>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>
                                    <?php
                                    if (isset($error['p'])) {
                                        echo "<h5 class='text-center alert alert-danger'>" . $error['p'] . "</h5>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>
                                    <?php
                                    if (isset($error['i'])) {
                                        echo "<h5 class='text-center alert alert-danger'>" . $error['i'] . "</h5>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label>Add Admin Picture</label>
                                        <input type="file" name="img" class="form-control">
                                    </div><br>
                                    <input type="submit" name="add" value="Add new Admin" class="btn btn-success">
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
