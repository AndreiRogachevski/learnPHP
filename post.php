<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_status_error', 1);

$post_id = $_GET['post_id'];
if (!is_numeric($post_id)) {
  echo 'PAGE NOT FOUND';
  exit();
};
require 'app/header.php';

$post = get_single_post($post_id);
?>

<div class="row">
  <div class="col-md-9">
    <h1 class="display-4 border-bottom pb-2"><?= $post['title'] ?></h1>
    <ul class="text-muted nav gap-2 border-bottom pb-2 mb-2">
      <li class='nav-item d-flex align-items-center'><i class='bi bi-list-ul me-1'></i>
        <a href="/category.php?id=<?= $post['category_id'] ?>" class="text-decoration-none"><?= get_category_title($post['category_id']) ?></a>|
      </li>
      <li class='nav-item d-flex align-items-center'><i class='bi bi-calendar3 me-1'></i><?= datefmt_format($IntlDateFormatter, $post['created_at']) ?></li>
    </ul>
    <div class="post-content">
      <img src="<?= $post['image'] ?>" alt="post image" class="img-fluid col-md-5 rounded float-md-start me-2 mt-2">
      <?php echo $post['content'] ?>
    </div>
  </div>
  <div class="col-md-3">
    <?php include_once './app/include/sidebar.php' ?>
  </div>
</div>

<?php
include 'app/footer.php';
?>