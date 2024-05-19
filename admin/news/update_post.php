<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $post_row = getPostById($id);
}
if (isset($_POST['submit_update'])) {
  if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    updatePost($id, $title, $content);
    header('Location: /admin/news');exit;
  }
}
?>

<div class="container">
  <form method="post">
    <div class="my-3">
      
      <label for="title" class="form-label">Post nomi</label>
      <input type="text" class="form-control" id="title" name="title" value="<?=$post_row['title']?>">

      <label for="content" class="form-label">Post kontenti</label>
      <input type="text" class="form-control" id="content" name="content" value="<?=$post_row['content']?>">
      

    </div>
    <button type="submit" name="submit_update" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php 
include '../footer.php';
?>
