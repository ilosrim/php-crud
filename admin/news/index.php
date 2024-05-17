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
    <h2>Yangiliklar</h2>
    <a href="/admin/news/add_post.php" class="btn btn-primary">Qo'shish</a>
  </div>

  <!-- table -->
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Created at</th>
        <th scope="col">Updated at</th>
        <th scope="col">Viewed count</th>
        <th scope="col">Author ID</th>
        <th scope="col">Category ID</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach (getPostList($page) as $item) {
          echo "<tr>";
          echo "<td>".$item['id']."</td>";
          echo "<td>".$item['title']."</td>";
          echo "<td>".substr($item['content'], 0, 40)."...</td>";
          echo "<td>".$item['created_at']."</td>";
          echo "<td>".$item['updated_at']."</td>";
          echo "<td>".$item['viewed_count']."</td>";
          echo "<td>".$item['author_id']."</td>";
          echo "<td>".$item['category_id']."</td>";
          echo "<td>
            <div class='btn-group'>
            <a href='/admin/news/update_post.php?id=".$item['id']."' class='btn btn-success'>Yangilash</a>
            <a href='/admin/news/delete_post.php?id=".$item['id']."' class='btn btn-danger'>O'chirish</a>
            </div>
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
    <?php for($page = 1; $page <= getPagination('post'); $page++): ?>
      <li class="page-item">
        <a class="page-link" href="/admin/news/index.php?page=<?=$page?>"><?=$page?></a>
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
