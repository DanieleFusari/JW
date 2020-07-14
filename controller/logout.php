<?php
session_start();
$_SESSION['flash'] = ' Logged out Successfully';
$_SESSION['flash_colour'] = 'green';
setcookie('token', 'hello', time() - 1,  '/');
header("location: /");
exit();
