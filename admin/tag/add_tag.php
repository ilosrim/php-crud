<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_POST['submit'])) {
  if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
    $name = $_POST['name'];
    addTag($name);
    header('Location: /admin/tag'); 
    exit;
  }
}
?>

<div class="container">
  <div class="col-3">
    <div class="row">
      <form method="post">
        <div class="my-3">

          <label for="name" class="form-label">Teg nomi</label>
          <input type="text" class="form-control" id="name" name="name">
          
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

<?php 
include '../footer.php';
?>
