<?php

if(isset($_POST['title'])) {
  $slug = preg_replace('/[^\da-z]/', '-', strtolower($_POST['title']));
 
  $suffix = '';

  while(file_exists('../data/' . $slug . $suffix)) { 
    $suffix = $suffix == '' ? 1 : $suffix + 1;
  }

  $card = [
    'title' => $_POST['title'],
    'front' => $_POST['front'],
    'back' => $_POST['back']
  ];

  file_put_contents('../data/' . $slug . $suffix, json_encode($card));

  header('Location: list');
  exit();
} else {
  ob_start();
  require 'view/add.php';
  $content = ob_get_clean();

  layout($title, $content);
}
