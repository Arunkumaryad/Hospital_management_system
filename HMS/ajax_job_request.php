<?php
include('../HMS/includes/connection.php');

$stmt = $connection->prepare("SELECT * FROM doctors");
$stmt->execute();

$output = "";

// Check if there are no job requests yet
if ($stmt->rowCount() < 1) {
    $statusMessage = "No Job Request Yet.";
    $output .= "
        <tr>
            <td colspan='8' class='text-center'>$statusMessage</td>
        </tr>
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
                <th>Action</th>
            </tr>
    ";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $status = $row['status'];

        if ($status !== 'approved' && $status !== 'rejected' ) {
            $output .= "
                <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['firstname']."</td>
                    <td>".$row['surname']."</td>
                    <td>".$row['username']."</td>
                    <td>".$row['gender']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['country']."</td>
                    <td>
                        <div class='col-md-12'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <button id='".$row['id']."' class='btn btn-success approve'>Approve</button>
                                </div><br>
                                <div class='col-md-6'>
                                    <button id='".$row['id']."' class='btn btn-danger reject'>Reject</button>
                                </div>
                            </div>
                        </div>
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