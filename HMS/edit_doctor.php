<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Doctor</title>
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update the salary?");
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
                    <h5 class="text-center">Edit Doctor</h5>

                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $connection->prepare("SELECT * FROM doctors WHERE id=:id");
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                            echo '
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="center">Doctor Details</h5>
                                    <h5 class="my-3"> ID : ' . $row['id'] . '</h5>
                                    <h5 class="my-3"> Firstname : ' . $row['firstname'] . '</h5>
                                    <h5 class="my-3"> Surname : ' . $row['surname'] . '</h5>
                                    <h5 class="my-3"> Username : ' . $row['username'] . '</h5>
                                    <h5 class="my-3"> Email : ' . $row['email'] . '</h5>
                                    <h5 class="my-3"> Gender : ' . $row['gender'] . '</h5>
                                    <h5 class="my-3"> Phone : ' . $row['phone'] . '</h5>
                                    <h5 class="my-3"> Country : ' . $row['country'] . '</h5>
                                    <h5 class="my-3"> Salary : $' . $row['salary'] . '</h5>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center">Update Salary</h5>';

                            if (isset($_POST["update"])) {
                                $salary = $_POST["salary"];
                                $stmt = $connection->prepare("UPDATE doctors SET salary=:salary WHERE id=:id");
                                $stmt->bindParam(':salary', $salary);
                                $stmt->bindParam(':id', $id);
                                $stmt->execute();
                            }

                            echo '
                                    <form method="post" onsubmit="return confirmUpdate(); disableButton();">
                                        <label>Enter Doctor Salary</label>
                                        <input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Enter Doctor Salary" value="' . $row['salary'] . '">
                                        <input type="submit" id="updateButton" name="update" class="btn btn-info my-3" value="Update Salary">
                                    </form>
                                </div>
                            </div>
                            ';
                        } else {
                            echo 'No doctor found with the specified ID.';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>