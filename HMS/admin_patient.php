<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Total Patient</title>
</head>

<body>
    <?php
    include('../HMS/includes/header.php');
    include('../HMS/includes/connection.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                    include('sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Total Patient</h5>
                    <?php
                    $stmt = $connection->prepare("SELECT * FROM patient");
                    $stmt->execute();

                    $output = "";

                    // Check if there are any patients
                    if ($stmt->rowCount() < 1) {
                        $statusMessage = "No Patients Found.";
                        $output .= "
                            <p>$statusMessage</p>
                        ";
                    } else {
                        $output .= "
                            <table class='table table-bordered'>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                        ";

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $output .= "
                                <tr>
                                    <td>".$row['p_id']."</td>
                                    <td>".$row['p_email']."</td>
                                    <td>".$row['p_password']."</td>
                                    <td>".$row['p_username']."</td>
                                    <td>
                                        <a href='edit_patient.php?id=".$row['p_id']."'>
                                            <button class='btn btn-info'>Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            ";
                        }

                        $output .= "
                            </table>
                        ";
                    }

                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
