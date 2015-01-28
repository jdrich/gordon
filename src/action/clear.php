<?php

unset($_SESSION['test']); 
unset($_SESSION['answers']);

header('Location: index');
exit();
