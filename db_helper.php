<?php
function getCategoryList($page) {
  include "conn.php";

  $limit = 5;
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM category LIMIT :offset, :limit";
  $state = $conn->prepare($sql);
  $state->bindValue(":limit", $limit, PDO::PARAM_INT);
  $state->bindValue(":offset", $offset, PDO::PARAM_INT);
  try {
    $state->execute();
  } catch (PDOException $e) { 
    throw $e;
  }
  $result = $state->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

function addCategory($title) {
  include "conn.php";
  $sql_insert = "INSERT INTO category(title) VALUES(:title)";
  $state = $conn->prepare($sql_insert);
  $state->bindValue(":title", $title);
  try {
    $state->execute();
  } catch (PDOException $e) { 
    print_r($e->getMessage());
  }
  header("Location: /admin/category");exit;
}

function getPagination() {
  include "conn.php";
  $limit = 5;
  $sql = "SELECT * FROM category";
  $state = $conn->prepare($sql);
  try {
    $state->execute();
  } catch (PDOException $e) { 
    throw $e;
  }
  $total_rows = $state->rowCount();
  return ceil($total_rows / $limit);
}