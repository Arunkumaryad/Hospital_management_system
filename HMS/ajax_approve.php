<?php
include('../HMS/includes/connection.php');
$id = $_POST['id'];
$query = "UPDATE doctors SET status='approved' WHERE id=:id";
$stmt = $connection->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>
