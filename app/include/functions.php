<?php

$IntlDateFormatter = datefmt_create(
  'ru-RU',
  IntlDateFormatter::FULL,
  IntlDateFormatter::FULL,
  'Europe/Minsk',
  null,
  'dd LLLL y, EEE HH:mm'
);

function get_categories()
{
  global $link;
  $sql = "SELECT * FROM `categories`;";
  mysqli_set_charset($link, 'utf8mb4');
  $result = mysqli_query($link, $sql);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
};

function get_posts($limit, $offset)
{
  global $link;
  $sql = "SELECT * FROM `posts` LIMIT $limit OFFSET $offset;";
  $result = mysqli_query($link, $sql);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
};

function get_single_post($id)
{
  global $link;
  $sql = "SELECT * FROM `posts` WHERE `id`=$id;";
  $result = mysqli_query($link, $sql);
  return mysqli_fetch_assoc($result);
};

function generate_token($length = 8)
{
  $string = '';
  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890';
  $num_chars =  strlen($chars);
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $num_chars) - 1, 1);
  }
  return $string;
};

function insert_subscriber($email)
{
  global $link;
  $email = mysqli_real_escape_string($link, $email);
  $query = "SELECT * FROM `subscribers` WHERE email = '$email'";
  $result = mysqli_query($link, $query);

  if (!mysqli_num_rows($result)) {
    $subscriber_token = generate_token();
    $insert_query = "INSERT INTO `subscribers` (email,token) VALUES ('$email','$subscriber_token')";
    $result = mysqli_query($link, $insert_query);
    return $result ? 'created' : 'fail';
  } else {
    return 'exist';
  };
}

function get_posts_by_category($category_id)
{
  global $link;
  $category_id = mysqli_real_escape_string($link, $category_id);
  $sql = "SELECT * FROM `posts` WHERE `category_id` = '$category_id'";
  $result = mysqli_query($link, $sql);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function get_category_title($category_id)
{
  global $link;
  $category_id = mysqli_real_escape_string($link, $category_id);
  $sql = "SELECT `title` FROM `categories` WHERE `id`=$category_id;";
  $result = mysqli_query($link, $sql);
  return mysqli_fetch_assoc($result)['title'];
}
