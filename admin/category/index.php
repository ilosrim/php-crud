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

  <!-- table -->
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach (getCategoryList($page) as $item) {
          echo "<tr>";
          echo "<td>".$item['id']."</td>";
          echo "<td>".$item['title']."</td>";
          echo "<td>
            <a href='/admin/category/update_category.php?id=".$item['id']."' class='btn btn-success'>Yangilash</a>
            <a href='/admin/category/delete_category.php?id=".$item['id']."' class='btn btn-danger'>O'chirish</a>
          </td";
          echo "</tr>";
        }
      ?>
      
    </tbody>
  </table>
  <nav aria-label="Page navigation example">
  
  <!-- pagination -->
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
