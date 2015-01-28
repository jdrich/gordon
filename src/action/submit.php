<?php

if(isset($_SESSION['test'])) {
  if(count($_SESSION['answered']) != count($_SESSION['test'])) {
    http(400, 'Incomplete');
  }
}

$test_file = '../tests/' . $_SESSION['username'] . '.json';

if(file_exists($test_file)) {
  $tests = json_decode(file_get_contents($test_file), true);
} else {
  $tests = [];
}

if(isset($_SESSION['test'])) {
  $tests[time()] = $_SESSION['test'];

  file_put_contents($test_file, json_encode($tests));

  unset($_SESSION['test']);
  unset($_SESSION['answers']);
}

$success = [];

foreach($tests as $time => $test) {
  foreach($test as $question => $answer) {
    if(!isset($success[$question])) {
      $success[$question] = [];
    }

    $success[$question][] = $answer;
  } 
}

ob_start();
require 'view/submit.php';
$content = ob_get_clean();

layout($title, $content);
