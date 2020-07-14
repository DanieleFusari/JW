<?php

session_start();
include 'functions_database.php';
$login_details = login_details();
$id = $login_details['sub'];


$new_password = filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

if($new_password === $confirm_password && !empty($new_password)){
  $password = password_hash($new_password, PASSWORD_DEFAULT);
  try {
    $db->query("UPDATE login SET 'password' = '$password' WHERE id = '$id' ");
    flash('Password Updated', 'green');
    header('Location: /');
    exit();
  } catch (\Exception $e) {
    flash('An error happend ' . $e->getMessage(), 'red');
  }
} else {
  flash("Password do not match try again.", 'red');
}

header('Location: /../change_password');
exit();
