<?php

define('DEV', true);

if(DEV) {
  ini_set('display_errors', true);
  error_reporting(E_ALL);
}

$action = ltrim(explode('?',$_SERVER['REQUEST_URI'])[0], '/');

$action == '' && $action = 'index';

$title = ucfirst($action);

if(!ctype_alpha($action)) {
  http(401, 'Unauthorized');
}

require '../src/init.php';

session_start();

require 'auth.php';

if(file_exists('../src/action/' . $action . '.php')) {
  require '../src/action/' . $action . '.php';
} else {
  http(400, 'Bad Request');
}

function http($code, $message) {
  header('HTTP/1.0 ' . $code . ' ' . $message);
  exit();
}

function layout($title, $content) {
  require 'view/_layout.php';
  exit();
}
