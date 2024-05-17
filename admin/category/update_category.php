<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $category_row = getCategoryById($id);
}
if (isset($_POST['submit_update'])) {
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
    updateCategory($id, $title);
    header('Location: /admin/category/index.php'); 
    exit;
  }
}
?>

<div class="container">
  <form method="post">
    <div class="my-3">
      <label for="id" class="form-label">Kategoriya ID-si</label>
      <input type="text" class="form-control" id="id" name="id" value="<?=$category_row['id']?>" disabled>

      <label for="title" class="form-label">Kategoriya nomi</label>
      <input type="text" class="form-control" id="title" name="title" value="<?=$category_row['title']?>">
    </div>
    <button type="submit" name="submit_update" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
include '../footer.php';
?>
