<?php

ob_start();
require 'view/complete.php';
$content = ob_get_clean();

layout($title, $content);
