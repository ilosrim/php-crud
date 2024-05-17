<?php
function getCategoryList($page) {
  include "conn.php";
  $limit = 5;
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM category LIMIT :offset, :limit";
  $state = $conn->prepare($sql);
  $state->bindValue(":limit", $limit, PDO::PARAM_INT);
  $state->bindValue(":offset", $offset, PDO::PARAM_INT);
  $state->execute();
  $result = $state->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function addCategory($title) {
  include "conn.php";
  $sql_insert = "INSERT INTO category(title) VALUES(:title)";
  $state = $conn->prepare($sql_insert);
  $state->bindValue(":title", $title);
  $state->execute();
  header("Location: /admin/category");exit;
}

function getPagination() {
  include "conn.php";
  $limit = 5;
  $sql = "SELECT * FROM category";
  $state = $conn->prepare($sql);
  $state->execute();
  $total_rows = $state->rowCount();
  return ceil($total_rows / $limit);
}

function getCategoryById($id) {
  include "conn.php";
  $sql = "SELECT * FROM category WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->execute();
  return $state->fetch(PDO::FETCH_ASSOC);
}

function updateCategory($id, $title) {
  include "conn.php";
  $sql = "UPDATE category SET title = :title WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->bindValue(":title", $title, PDO::PARAM_STR);
  $state->execute();
}

function deleteCategory($id) {
  include "conn.php";
  $sql = "DELETE FROM category WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->execute();
}