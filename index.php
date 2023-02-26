<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_status_error', 1);

require 'app/header.php';

?>

<div class="row">
  <div class="col-md-9">
    <h1 class="display-4 border-bottom pb-2">Все записи:</h1>
    <select name="page-select" id="page-select" class="form-select my-2">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $offset = $limit * ($page - 1);
    $posts = get_posts($limit, $offset);
    ?>
    <?php foreach ($posts as $post) : ?>
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col-lg-3 d-lg-block m-1">
          <img src="<?= $post['image'] . $post['id'] ?>" alt="thumbnail" class="img-thumbnail">
        </div>
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="mb-0">
            <a href="/post.php?post_id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
          </h3>
          <p class="card-text d-block"><?= substr($post['content'], 0, 128) . '...'  ?>
            <a href="/post.php?post_id=<?= $post['id'] ?>" class="stretched-link mb-auto d-block">Продолжить читать</a>
          </p>
          <ul class="text-muted nav gap-2">
            <li class='nav-item d-flex align-items-center'><i class='bi bi-list-ul me-1'></i>
              <a href="/category.php?id=<?= $post['category_id'] ?>" class="text-decoration-none position-relative z-1"><?= get_category_title($post['category_id']) ?></a>|
            </li>
            <li class='nav-item d-flex align-items-center'><i class='bi bi-calendar3 me-1'></i><?= datefmt_format($IntlDateFormatter, $post['created_at']) ?></li>
          </ul>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <div class="col-md-3">
    <?php include_once './app/include/sidebar.php' ?>
  </div>
</div>

<?php
include 'app/footer.php';
?>