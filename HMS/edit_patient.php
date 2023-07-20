<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Patient</title>
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update the Username?");
        }

        function disableButton() {
            document.getElementById("updateButton").disabled = true;
        }
    </script>
</head>

<body>
    <?php
    include('../HMS/includes/header.php');
    include('../HMS/includes/connection.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include('sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Edit Patient</h5>

                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $connection->prepare("SELECT * FROM patient WHERE p_id=:id");
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                            echo '
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="center">Patient Details</h5>
                                    <h5 class="my-3"> ID : ' . $row['p_id'] . '</h5>
                                    <h5 class="my-3"> Firstname : ' . $row['p_email'] . '</h5>
                                    <h5 class="my-3"> Surname : ' . $row['p_password'] . '</h5>
                                    <h5 class="my-3"> Username : ' . $row['p_username'] . '</h5>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center">Update Username</h5>';

                            if (isset($_POST["update"])) {
                                $username = $_POST["p_username"];
                                $stmt = $connection->prepare("UPDATE patient SET p_username=:username WHERE p_id=:id");
                                $stmt->bindParam(':username', $username);
                                $stmt->bindParam(':id', $id);
                                $stmt->execute();

                                // Redirect to admin.php after successful update
                                header("Location: admin_patient.php");
                                exit();
                            }

                            echo '
                                    <form method="post" onsubmit="return confirmUpdate(); disableButton();">
                                        <label>Enter Patient Username</label>
                                        <input type="text" name="p_username" class="form-control" autocomplete="off" placeholder="Enter User Name" value="' . $row['p_username'] . '">
                                        <input type="submit" id="updateButton" name="update" class="btn btn-info my-3" value="Confirm">
                                    </form>
                                </div>
                            </div>
                            ';
                        } else {
                            echo 'No Patient found with the specified ID.';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>