<?php

ob_start();
require 'view/index.php';
$content = ob_get_clean();

layout($title, $content);
