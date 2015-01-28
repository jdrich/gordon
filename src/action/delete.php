<?php

if(isset($_POST['slug'])) {
  $slug = $_POST['slug'];

  if(file_exists('../data/' . $slug)) {
    unlink('../data/' . $slug);
  }
}

header('Location: list');
exit();

