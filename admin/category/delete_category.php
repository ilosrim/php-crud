<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $category_row = getCategoryById($id);
  if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
    deleteCategory($id);
    header('Location: /admin/category/index.php');exit;
  } else if(isset($_GET['confirm']) && $_GET['confirm'] === "no") {
    header('Location: /admin/category/index.php');exit;
  }
}
?>

<div class="container">
  <p class="text-warning">*Rostdan ham o'chirmoqchimisiz?</p>
  <a href="/admin/category/delete_category.php?id=<?=$id?>&confirm=yes" class="btn btn-danger">Ha</a>
  <a href="/admin/category/delete_category.php?id=<?=$id?>&confirm=no" class="btn btn-success">Yo'q</a>
</div>

<?php 
include '../footer.php';
?>