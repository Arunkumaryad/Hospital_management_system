<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Total Doctors</title>
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
                    <h5 class="text-center">Total Doctors</h5>
                    <?php
                    $stmt = $connection->prepare("SELECT * FROM doctors WHERE status='approved'");
                    $stmt->execute();

                    $output = "";

                    // Check if there are no approved doctors yet
                    if ($stmt->rowCount() < 1) {
                        $statusMessage = "No Approved Doctors Yet.";
                        $output .= "
                            <p>$statusMessage</p>
                        ";
                    } else {
                        $output .= "
                            <table class='table table-bordered'>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Surname</th>
                                    <th>Username</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                        ";

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $status = $row['status'];

                            if ($status === 'approved') {
                                $output .= "
                                    <tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['firstname']."</td>
                                        <td>".$row['surname']."</td>
                                        <td>".$row['username']."</td>
                                        <td>".$row['gender']."</td>
                                        <td>".$row['phone']."</td>
                                        <td>".$row['country']."</td>
                                        <td>".$row['salary']."</td>
                                        <td>
                                            <a href='edit_doctor.php?id=".$row['id']."'>
                                                <button class='btn btn-info'>Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                ";
                            }
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
