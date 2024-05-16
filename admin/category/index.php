<?php
include '../header.php';
include '../../db_helper.php';

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

?>
<div class="container my-3">
  <div class="d-flex align-items-center justify-content-between">
    <h2>Kategoriyalar</h2>
    <a href="/admin/category/add_category.php" class="btn btn-primary">Qo'shish</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (getCategoryList($page) as $new): ?>
        <tr>
          <?php foreach ($new as $detail): ?>
            <td><?php echo $detail; ?></td>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($page = 1; $page <= getPagination(); $page++): ?>
      <li class="page-item">
        <a class="page-link" href="/admin/category/index.php?page=<?=$page?>"><?=$page?></a>
      </li>
    <?php endfor; ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
<?php 
include '../footer.php';
?>
