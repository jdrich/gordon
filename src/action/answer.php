<?php

$slug = isset($_POST['slug']) && isset($_SESSION['test'][$_POST['slug']]) ? $_POST['slug'] : false;

if(!$slug) {
  http(500, 'Something Went Wrong');
}

$answer = $_POST['answer'] == 'knew' ? 1 : 0;

$_SESSION['test'][$slug] = $answer;
$_SESSION['answered'][] = $slug;

header('Location: test');
exit();
