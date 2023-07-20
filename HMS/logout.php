<?php
session_start();

if (isset($_SESSION['AdminId'])) {
    // If admin is logged in, destroy the admin session
    session_destroy();
    header("location: login.php");
} elseif (isset($_SESSION['PatientId'])) {
    // If patient is logged in, destroy the patient session
    session_destroy();
    header("location: login.php");
} elseif (isset($_SESSION['DoctorId'])) {
    // If doctor is logged in, destroy the doctor session
    session_destroy();
    header("location: login.php");
} else {
    // If no session is set, redirect to index.php
    header("location: index.php");
}
?>
