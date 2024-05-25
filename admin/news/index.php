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
    <a href="/admin/news/add_post.php" class="btn btn-primary d-flex align-items-center">
      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'>
        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>
        <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4'/>
      </svg>
    </a>
  </div>

  <!-- table -->
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Category</th>
        <th scope="col">Author</th>
        <th scope="col">Viewed count</th>
        <th scope="col">Created at</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach(getPostList($page) as $item):?>
        <?php 
          $category = getCategoryById($item['category_id']);
          $author = getAuthorById($item['author_id']);
        ?>
        <tr>
          <th><?= $item['id'];?></th>
          <td><?= $item['title'];?></td>
          <td><?= substr($item['content'], 0, 40);?></td>
          <td><?= $category['title'];?></td>
          <td><?= $autdor['username'];?></td>
          <td><?= $item['viewed_count'];?></td>
          <td><?= $item['created_at'];?></td>
          <td>
            <div class='btn-group'>
              <a href='/admin/news/update_post.php?id=".$item['id']."' class='btn btn-success d-flex align-items-center'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-clockwise' viewBox='0 0 16 16'>
                  <path fill-rule='evenodd' d='M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z'/>
                  <path d='M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466'/>
                </svg>
              </a>
              <a href='/admin/news/delete_post.php?id=".$item['id']."' class='btn btn-danger d-flex align-items-center'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                  <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
                </svg>
              </a>
            </div>
          </td>
        </tr>
      <?php endforeach?>
    </tbody>
  </table>
  <nav class="pagination_class" aria-label="Page navigation example">
  
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
