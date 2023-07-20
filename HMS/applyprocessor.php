<?php
session_start();
include('../HMS/includes/connection.php');
try {

  //Photos file
  // Count total files
  $countfiles = count($_FILES['files']['name']);


  // Prepared statement
  for ($i = 0; $i < $countfiles; $i++) {
    $filename = $_FILES['files']['name'][$i];
    $filesize = $_FILES['files']['size'][$i];

    // Check file size
    if ($filesize > 1000000) { // 1MB in bytes
      $_SESSION['error_message'] = "The uploaded file '$filename' exceeds the maximum allowed size of 1MB.";
      header("location:signup.php");
      exit();
    }

    $target_file = './uploads/' . $filename;
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    $valid_extension = array("png", "jpeg", "jpg");

    //add code for other fields
    // prepare sql and bind parameters

    $statement = $connection->prepare("insert into doctors(firstname,surname,username,email,gender,phone,country,password,photo) values (:fname,:lname,:uname,:email,:gender,:contact,:country,:password,:photos)");

    // insert a row
    $firstname = $_POST["username"];
    $username = $_POST["firstname"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];
    $lastname = $_POST["lastname"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $password = $_POST["password"];




    $statement->bindParam(':fname', $firstname);
    $statement->bindParam(':uname', $username);
    $statement->bindParam(':lname', $lastname);
    $statement->bindParam(':contact', $contact);
    $statement->bindParam(':gender', $gender);
    $statement->bindParam(':country', $country);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':photos', $target_file);

    //add code ends for other fields

    if (in_array($file_extension, $valid_extension)) {

      if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
        // Execute query
        $statement->execute();

        if ($statement->rowCount() > 0) {
          // Set success message
          $_SESSION['success_message'] = "Your details have been updated successfully. Please Login Again With Updated Credentials";
        } else {
          echo "Error: Data not inserted.";
        }
      }
    }
  }

  $connection = null;
  header("location:login.php");
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
