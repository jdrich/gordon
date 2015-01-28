<?php

$cards = [];

$dir = opendir('../data');

while($file = readdir($dir)) {
  if(is_file('../data/' . $file)) {
    $cards[$file] = json_decode(file_get_contents('../data/' . $file), true)['title'];
  }  
}

closedir($dir);

ob_start();
require 'view/list.php';
$content = ob_get_clean();

layout($title, $content);
