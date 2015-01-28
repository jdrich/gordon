<?php

if(isset($_POST['username']) && isset($_POST['password'])) {
  $users = json_decode(file_get_contents('../users.json'), true);

  if(isset($users[$_POST['username']]) && $users[$_POST['username']] == $_POST['password']) {
    $_SESSION['username'] = $_POST['username'];

    require 'action/' . $action . '.php';
  } else {
    $message['danger'] = 'Invalid login credentials';
  } 
} 

if(!isset($_SESSION['username'])) {
  $title = 'Login';

  ob_start();
  require 'view/login.php';
  $content = ob_get_clean();

  layout($title, $content);

  http(401, 'Login Required');
}
