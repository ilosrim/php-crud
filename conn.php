<?php
## Connection
$servername = 'localhost';
$db_username = 'root';
$db_password = '1234';
$dbname = 'blog';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname",$db_username, $db_password);
  // print("Bazaga ulandi <br>");
} catch (PDOException $e) {
  echo "Bazaga ulana olmadi: ".$e->getMessage()."<br>";
}