<?php

include_once './app/include/database.php';
include_once './app/include/functions.php';

if (isset($_POST['email'])) {
  $email = trim($_POST['email']);
  $insert_result = insert_subscriber($email);
  $header = "Location: /?subscriber=";
  $header .= $insert_result;
  header($header);
} else {
  echo $_POST;
  header('Location: /');
};
