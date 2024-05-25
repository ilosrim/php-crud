<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $tag_row = getTagById($id);
  if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
    deleteTag($id);
    header('Location: /admin/tag');exit;

  } else if(isset($_GET['confirm']) && $_GET['confirm'] === "no") {
    header('Location: /admin/tag');exit;
  }
}
?>

<div class="container">
  <p class="text-warning">*Rostdan ham o'chirmoqchimisiz?</p>
  <a href="/admin/tag/delete_tag.php?id=<?=$id?>&confirm=yes" class="btn btn-danger">Ha</a>
  <a href="/admin/tag/delete_tag.php?id=<?=$id?>&confirm=no" class="btn btn-success">Yo'q</a>
</div>

<?php 
include '../footer.php';
?>