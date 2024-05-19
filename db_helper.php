<?php

// C A T E G O R Y section ------------------------------------------------------------------------
function getCategoryList($page, $withoutLimit = false) {
  include "conn.php";
  if ($withoutLimit) {
    $sql = "SELECT * FROM category";
    $state = $conn->prepare($sql);
  } else {
    $limit = 5;
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM category LIMIT :offset, :limit";
    $state = $conn->prepare($sql);
    $state->bindValue(":limit", $limit, PDO::PARAM_INT);
    $state->bindValue(":offset", $offset, PDO::PARAM_INT);
  }
  
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

function getPagination($tableName) {
  include "conn.php";
  $limit = 5;
  $sql = "SELECT * FROM ".$tableName;
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

// P O S T section ---------------------------------------------------------------------
function getPostList($page) {
  include "conn.php";
  $limit = 5;
  $offset = ($page - 1) * $limit;
  $sql = "SELECT * FROM post LIMIT :offset, :limit";
  $state = $conn->prepare($sql);
  $state->bindValue(":limit", $limit, PDO::PARAM_INT);
  $state->bindValue(":offset", $offset, PDO::PARAM_INT);
  $state->execute();
  $result = $state->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function addPost($title, $content, $authorID, $categoryID, $tags=null) {
  include "conn.php";
  $sql_insert = "INSERT INTO post(title, content, created_at, viewed_count, author_id, category_id) VALUES(:title, :content, :created_at, :viewed_count, :author_id, :category_id)";
  $state = $conn->prepare($sql_insert);
  $state->bindValue(":title", $title);
  $state->bindValue(":content", $content);
  $state->bindValue(":created_at", date("Y-m-d H-i-s"));
  $state->bindValue(":viewed_count", 1, PDO::PARAM_INT);
  $state->bindValue(":author_id", $authorID);
  $state->bindValue(":category_id", $categoryID);
  $state->execute();

  $post_id = $conn->lastInsertId();
  $sql_post_tag = "INSERT INTO post_tag(post_id, tag_id) VALUES(:post_id, :tag_id)";
  if ($tags != null) {
    foreach ($tags as $tag) {
      $state_tag = $conn->prepare($sql_post_tag);
      $state_tag->bindValue(":post_id", $post_id, PDO::PARAM_INT);
      $state_tag->bindValue(":tag_id", $tag, PDO::PARAM_INT);
      $state_tag->execute();
    }
  }
  header("Location: /admin/news");exit;
}

function getAuthorById($id) {
  include "conn.php";
  $sql = "SELECT * FROM user WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->execute();
  return $state->fetch(PDO::FETCH_ASSOC);
}
function getAuthorList($page, $withoutLimit = false) {
  include "conn.php";
  if ($withoutLimit) {
    $sql = "SELECT * FROM user";
    $state = $conn->prepare($sql);
  } else {
    $limit = 5;
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM user LIMIT :offset, :limit";
    $state = $conn->prepare($sql);
    $state->bindValue(":limit", $limit, PDO::PARAM_INT);
    $state->bindValue(":offset", $offset, PDO::PARAM_INT);
  }
  
  $state->execute();
  $result = $state->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function getPostById($id) {
  include "conn.php";
  $sql = "SELECT * FROM post WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->execute();
  return $state->fetch(PDO::FETCH_ASSOC);
}
function updatePost($id, $title, $content) {
  include "conn.php";
  $sql = "UPDATE post 
  SET title=:title, content=:content 
  WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->bindValue(":title", $title, PDO::PARAM_STR);
  $state->bindValue(":content", $content, PDO::PARAM_STR);
  $state->execute();
}

function deletePost($id) {
  include "conn.php";
  $sql = "DELETE FROM post WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->execute();
}

// TAG section --------------------------------------------------------------
function getTagList($page, $withoutLimit = false) {
  include "conn.php";
  if ($withoutLimit) {
    $sql = "SELECT * FROM tag";
    $state = $conn->prepare($sql);
  } else {
    $limit = 5;
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM tag LIMIT :offset, :limit";
    $state = $conn->prepare($sql);
    $state->bindValue(":limit", $limit, PDO::PARAM_INT);
    $state->bindValue(":offset", $offset, PDO::PARAM_INT);
  }
  
  $state->execute();
  $result = $state->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
function addTag($name) {
  include "conn.php";
  $sql_insert = "INSERT INTO tag(name) VALUES(:name)";
  $state = $conn->prepare($sql_insert);
  $state->bindValue(":name", $name);
  $state->execute();
  header("Location: /admin/tag");exit;
}
function getTagById($id) {
  include "conn.php";
  $sql = "SELECT * FROM tag WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->execute();
  return $state->fetch(PDO::FETCH_ASSOC);
}
function updateTag($id, $name) {
  include "conn.php";
  $sql = "UPDATE tag SET name = :name WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->bindValue(":name", $name, PDO::PARAM_STR);
  $state->execute();
}
function deleteTag($id) {
  include "conn.php";
  $sql = "DELETE FROM tag WHERE id = :id";
  $state = $conn->prepare($sql);
  $state->bindValue(":id", $id, PDO::PARAM_INT);
  $state->execute();
}