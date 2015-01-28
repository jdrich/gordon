<?php

if(isset($_POST['slug'])) {
  if(file_exists('../data/' . $_POST['slug'])) {
    $slug = $_POST['slug'];

    $card = [
      'title' => $_POST['title'],
      'front' => $_POST['front'],
      'back' => $_POST['back']
    ];

    file_put_contents('../data/' . $_POST['slug'], json_encode($card));
  } else {
    http(400, 'Invalid Slug');
  }
} elseif(!isset($_GET['card'])) {
  header('Location: list');
  exit();
}

!isset($slug) && $slug = $_GET['card'];

if(!file_exists('../data/' . $slug)) {
  http(400, 'Card Not Found');
}

$card = json_decode(file_get_contents('../data/' . $slug), true);

$form_action = 'edit';

ob_start();
require 'view/edit.php';
$content = ob_get_clean();

layout($title, $content);
