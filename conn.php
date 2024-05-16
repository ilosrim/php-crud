<?php
## Connection
$servername = 'localhost';
$username = 'root';
$password = '1234';
$dbname = 'blog';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
  // print("Bazaga ulandi <br>");
} catch (PDOException $e) {
  echo "Bazaga ulana olmadi: ".$e->getMessage()."<br>";
}