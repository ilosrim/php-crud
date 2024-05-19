<?php
session_start();

if (isset($_POST["register"])) {
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];

  if ($password != $confirm_password){
    $_SESSION['error'] = "Joriy parol tasdiqlovchi parolga teng emas!";
  } else {
    include '../../conn.php';
    $state = $conn->prepare('SELECT * FROM user WHERE username = :username');
    $state->bindValue(':username', $username);
    $state->execute();
    if ($state->rowCount() > 0) {
      $_SESSION['error'] = "Bunday username-li foydalanuvchi mavjud";
    } else {
      $role = 'author';
      $password = password_hash($password, PASSWORD_DEFAULT);
      $state = $conn->prepare("INSERT INTO user(username, firstname, lastname, password, role) 
      VALUES(:username, :firstname, :lastname, :password, :role)");
      $state->bindValue(":username", $username);
      $state->bindValue(":firstname", $firstname);
      $state->bindValue(":lastname", $lastname);
      $state->bindValue(":password", $password);
      $state->bindValue(":role", $role);
      try {
        $state->execute();
        $_SESSION["seccess"] = 'ok';
      } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
      }
    }
  }
} else {
  $_SESSION['error'] = "Maydonlarni to'ldiring";
}
header("Location: /admin/register");