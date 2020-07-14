<?php
session_start();
include 'functions_database.php';
$login_details = login_details();
$id = $login_details['sub'];
if ($login_details['auth'] !== 'E') {
  $_SESSION['flash'] = 'NOT AUTHRISED LOGGED OUT';
  $_SESSION['flash_colour'] = 'red';
  setcookie('token', 'hello', time() - 1,  '/');
  header('Location: /');
  exit();
}

$delete = filter_input(INPUT_GET, 'file_name', FILTER_SANITIZE_STRING);

echo $delete;
