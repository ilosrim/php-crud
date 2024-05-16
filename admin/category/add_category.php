<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_POST['submit'])) {
  if (isset($_POST['category']) && !empty(trim($_POST['category']))) {
    $category_name = $_POST['category'];
    addCategory($category_name);
    
  }
}
?>

<div class="container">
  <form method="post">
    <div class="my-3">
      <label for="id" class="form-label">Kategoriya ID-si (Yozish talab etilmaydi)</label>
      <input type="text" class="form-control" id="id" name="id" disabled>

      <label for="category" class="form-label">Kategoriya nomi</label>
      <input type="text" class="form-control" id="category" name="category">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
include '../footer.php';
?>
