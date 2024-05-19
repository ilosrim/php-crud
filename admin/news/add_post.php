<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $authorID = $_POST['author_id'];
  $categoryID = $_POST['category_id'];
  if (isset($_POST['post_tag'])) {
    $tags = $_POST['post_tag'];
  }
  addPost($title, $content, $authorID, $categoryID, $tags);
  header('Location: /admin/news');exit;
}

$categoryList = getCategoryList(1, true);
$tagList = getTagList(1, true);
$authorList = getAuthorList(1, true);
?>

<div class="container">
  <div class="col-6">
    <div class="row">
      <form method="post">
        <!-- TITLE -->
        <div class="my-3">
          <label for="title" class="form-label">Post nomi</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <!-- Content -->
        <div class="my-3">
          <label for="content" class="form-label">Kontent</label>
          <textarea type="text" class="form-control" id="content" name="content" rows="4" cols="50" ></textarea>
        </div>
        <!-- Category -->
        <div class="my-3">
          <select name="category_id" class="form-select" aria-label="Default select">
            <?php foreach ($categoryList as $item): ?>
              <option value="<?=$item['id']?>"><?=$item['title']?></option>
            <?php endforeach;?>        
          </select>
        </div>
        <!-- POST-TAG -->
        <div class="my-3">
          <label for="tag_label"><span class="text-danger">* </span><code>Shift</code> Tugmasini bosgan holda bir nechta teg tanlashingiz mumkin</label>
          <select class="form-select" multiple aria-label="Multiple select" name="post_tag[]">
            <?php foreach ($tagList as $item): ?>
              <option value="<?=$item['id']?>"><?=$item['name']?></option>
            <?php endforeach;?>
          </select>
        </div>
        <!-- AUTHOR -->
        <div class="my-3">
          <label for="author" class="form-label">Avtor</label>
          <select name="author_id" id="author"  class="form-select" aria-label="Multiple select">
            <?php foreach ($authorList as $item): ?>
              <option value="<?=$item['id']?>"><?=$item['username']?></option>
            <?php endforeach;?>
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-3">Qo'shish</button>
      </form>
    </div>
  </div>
</div>

<?php 
include '../footer.php';
?>
