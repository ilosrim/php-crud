<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $author_id = $_POST['author_id'];
  $category_id = $_POST['category_id'];
  addPost($title, $content, $author_id, $category_id);
  header('Location: /admin/news/index.php'); 
  exit;
}
$categoryList = getCategoryList(1, true);
// print_r("bla");
// print_r($_POST['title']);
var_dump($_POST['title']);
?>

<div class="container">
  <div class="col-6">
    <div class="row">
      <form method="post">
        <div class="my-3">
          <label for="title" class="form-label">Post nomi</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="my-3">
          <label for="content" class="form-label">Kontent</label>
          <textarea type="text" class="form-control" id="content" name="content" rows="4" cols="50" ></textarea>
        </div>
        <div class="my-3">
          <select class="form-select" aria-label="Default select example">
            <?php foreach ($categoryList as $item):?>
              <?= "<option value='".$item['$id']."'>".$item['title']."</option>"?>
            <?php endforeach;?>
          </select>
        </div>
        <div class="my-3">
          <label for="author" class="form-label">Avtor</label>
          <input type="number" class="form-control" id="author" name="author_id">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Qo'shish</button>
      </form>
    </div>
  </div>
</div>

<?php 
include '../footer.php';
?>
