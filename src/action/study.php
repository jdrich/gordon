<?php

$cards = [];
$slugs = [];

$dir = opendir('../data');

while($file = readdir($dir)) {
  if(is_file('../data/' . $file)) {
    $slugs[] = $file;
    $cards[$file] = json_decode(file_get_contents('../data/' . $file), true);
  }  
}

closedir($dir);

$slug = $slugs[rand(0, count($cards)-1)];

$card = $cards[$slug];

ob_start();
require 'view/study.php';
$content = ob_get_clean();

layout($title, $content);
