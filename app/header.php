<?php

require_once 'include/database.php';
require 'include/functions.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/icons/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/app.css">
  <!-- <style>
    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }
  </style> -->
</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="../public/icons/bootstrap-icons.svg#bootstrap-fill"></use>
        </svg>
        <span class="fs-4">Simple header</span>
      </a>
      <?php
      $categories = get_categories();
      ?>
      <ul class="nav nav-pills">
        <?php if ($categories === 0) : ?>
          <li class="nav-item"><a href="#" class="nav-link">Добавить категорию</a></li>
        <?php else : ?>
          <?php foreach ($categories as $category) : ?>
            <li class="nav-item"><a href="/category.php?id=<?= $category['id'] ?>" class="nav-link"><?= $category['title'] ?></a></li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </header>