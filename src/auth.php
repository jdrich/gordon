<?php

if(!isset($_SESSION['username'])) {
  require 'action/login.php';
}
