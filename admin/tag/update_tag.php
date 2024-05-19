<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $tag_row = getTagById($id);
}
if (isset($_POST['submit_update'])) {
  if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
    $name = $_POST['name'];
    updateTag($id, $name);
    header('Location: /admin/tag'); 
    exit;
  }
}
?>

<div class="container">
  <form method="post">
    <div class="my-3">
      <label for="name" class="form-label">Kategoriya nomi</label>
      <input type="text" class="form-control" id="name" name="name" value="<?=$tag_row['name']?>">
    </div>
    <button type="submit" name="submit_update" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
include '../footer.php';
?>
