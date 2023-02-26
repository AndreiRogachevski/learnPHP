<?php

$link = mysqli_connect('localhost', 'root', '', 'my_first_blog');
$link->set_charset("utf-8");

if (mysqli_connect_errno()) {
  echo 'Ошибка в подключении к базе данных (' . mysqli_connect_errno() . '): ' . mysqli_connect_error();
  exit();
}
