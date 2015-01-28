<?php

if(!isset($_SESSION['test'])) {
  $slugs = get_slugs();

  $_SESSION['test'] = array_combine($slugs, array_fill(0, count($slugs), 0));
  $_SESSION['answered'] = [];
}

$available = array_diff(array_keys($_SESSION['test']), $_SESSION['answered']);

if(count($available) == 0) {
  header('Location: complete');
  exit();
}

$slug = $available[array_rand($available)];

if(!file_exists('../data/' . $slug)) {
  unset($_SESSION['test'][$slug]);
  header('Location: test');
  exit();
} 

$card = json_decode(file_get_contents('../data/' . $slug), true);

$answered = count($_SESSION['answered']);
$total = count($_SESSION['test']);
$correct = array_sum(array_values($_SESSION['test']));

ob_start();
require 'view/test.php';
$content = ob_get_clean();

layout($title, $content);

function get_slugs() {
  $slugs = [];

  $dir = opendir('../data');

  while($file = readdir($dir)) {
    if(is_file('../data/' . $file)) {
      $slugs[] = $file;
    }
  }

  closedir($dir);

  return $slugs;
}
