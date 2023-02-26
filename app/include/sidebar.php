<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_status_error', 1);
$subscribe_status = isset($_GET['subscriber']) ? $_GET['subscriber'] : null;

?>

<div class="sing-form p-3  border rounded bg-light bg-gradient">
  <form class="my-2" action="/subscribe.php" method="POST">
    <?php if ($subscribe_status) : ?>
      <h5>Subscription <?= $subscribe_status ?></h5>
    <?php else : ?>
      <h5>Подписаться на новости!</h5>
    <?php endif; ?>
    <div class="form-floating my-3">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Введите Ваш EMAIL</label>
    </div>
    <button type="submit" class="btn btn-success">Подписаться</button>
  </form>
</div>