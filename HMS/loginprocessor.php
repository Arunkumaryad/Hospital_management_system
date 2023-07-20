<?php
session_start();
include('../HMS/includes/connection.php');  
try {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $message = '<label>All fields are required</label>';
    } else {
        $query = "SELECT * FROM admin WHERE (email = :email OR username = :email) AND password = :password";



        $statement = $connection->prepare($query);

        $statement->execute(
            array(
                'email'       => $_POST["username"],
                'password' => $_POST["password"]
            )
        );

        $count = $statement->rowCount();



        if ($count > 0) {
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $_SESSION["AdminUsername"] = $row["username"];
                $_SESSION["AdminEmail"] = $row["email"];
                $_SESSION["AdminPassword"] = $row["password"];
                $_SESSION["AdminPhotos"] = $row["photo"];
                $_SESSION["AdminId"] = $row["id"];
            }
            header("location:admindashboard.php");
        } else {
            $query = "SELECT * FROM doctors WHERE (email = :email OR username = :email) AND password = :password";

            $statement = $connection->prepare($query);

            $statement->execute(
                array(
                    'email'       => $_POST["username"],
                    'password' => $_POST["password"]
                )
            );
            $count = $statement->rowCount();



            if ($count > 0) {
                $result = $statement->fetchAll(\PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $_SESSION["DoctorPhotos"] = $row["photo"];
                    $_SESSION["DoctorFirstName"] = $row["firstname"];
                    $_SESSION["DoctorLastName"] = $row["surname"];
                    $_SESSION["DoctorContact"] = $row["phone"];
                    $_SESSION["DoctorEmail"] = $row["email"];
                    $_SESSION["DoctorUsername"] = $row["username"];
                    $_SESSION["DoctorPassword"] = $row["password"];
                    $_SESSION["DoctorId"] = $row["id"];
                }

                header("location:doctordashboard.php");
            } else {
                $query = "SELECT * FROM patient WHERE (p_email = :email OR p_username = :email) AND p_password = :ppassword";

                $statement = $connection->prepare($query);

                $statement->execute(
                    array(
                        'email'       => $_POST["username"],
                        'ppassword' => $_POST["password"]
                    )
                );

                $count = $statement->rowCount();



                if ($count > 0) {
                    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        $_SESSION["PatientUsername"] = $row["p_username"];
                        $_SESSION["PatientEmail"] = $row["p_email"];
                        $_SESSION["PatientPassword"] = $row["p_password"];
                        $_SESSION["PatientId"] = $row["p_id"];
                       
                    }
                    header("location:patientdashboard.php");
                } else {
                    $message = '<div style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; padding: 15px; border-radius: .25rem; text-align: center; margin-top:100px;">
                                    <p style="font-size: 24px; font-weight: bold;">Wrong Data</p>
                                    <p style="font-size: 18px;">Please check your login credentials and try again.</p>
                                    <a href="login.php" style="background-color:red; color: #fff; padding: 10px 20px; border-radius: .25rem; text-decoration: none; display: inline-block; margin-top: 20px;">Back to Home</a>
                                </div>';
                    echo $message;
                }
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
