<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // $post_row = getPostById($id);
  if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
    deletePost($id);
    header('Location: /admin/news');exit;
  } else if(isset($_GET['confirm']) && $_GET['confirm'] === "no") {
    header('Location: /admin/news');exit;
  }
}
?>

<div class="container">
  <p class="text-warning">*Rostdan ham o'chirmoqchimisiz?</p>
  <a href="/admin/news/delete_post.php?id=<?=$id?>&confirm=yes" class="btn btn-danger">Ha</a>
  <a href="/admin/news/delete_post.php?id=<?=$id?>&confirm=no" class="btn btn-success">Yo'q</a>
</div>