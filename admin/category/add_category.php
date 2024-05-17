<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_POST['submit'])) {
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
    addCategory($title);
    header('Location: /admin/category/index.php'); 
    exit;
  }
}
?>

<div class="container">
  <form method="post">
    <div class="my-3">
      <label for="id" class="form-label">Kategoriya ID-si (Yozish talab etilmaydi)</label>
      <input type="text" class="form-control" id="id" name="id" disabled>

      <label for="title" class="form-label">Kategoriya nomi</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
include '../footer.php';
?>
