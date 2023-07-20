<?php
$servername = "localhost";
$serverusername = "root";
$serverpassword = "";
$dbname = "hms";

try {
  $connection = new PDO("mysql:host=$servername;dbname=$dbname", $serverusername, $serverpassword);
  
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
