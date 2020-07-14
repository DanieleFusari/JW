<?php
session_start();
include 'functions_database.php';
$login_details = login_details();

if ($login_details['auth'] !== 'E') {
  flash('NOT AUTHRISED LOGGED OUT', 'red');
  setcookie('token', 'hello', time() - 1,  '/');
  header('Location: /');
  exit();
}

$s_a = filter_input(INPUT_POST, 's_a', FILTER_SANITIZE_STRING);
$amend = filter_input(INPUT_POST, 'amend', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$email = strtolower($email);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$auth = filter_input(INPUT_POST, 'auth', FILTER_SANITIZE_STRING);
$password = $_ENV['psswordHash'];

if(empty($email)){
  flash('Email Address can not be blank.', 'red');
  header('Location: ../sign_up');
  exit();
}

if (!$amend) {
  if(!$check) {
    try {
      $db->query( "INSERT INTO login VALUES(null, '$email', '$name', '$password', '$auth')" );
    } catch (\Exception $e) {
      flash($e->getMessage(), 'red');
    }
    flash("Created.  Please login and change your password", 'green');
  } else {
    flash('Email Address Already Exists', 'red');
  }
} else if($s_a === 'Update') {
  $checkid = $db->query("SELECT * FROM login WHERE id = '$id' ");
  $checkid = $checkid->fetch(PDO::FETCH_ASSOC);
  if($checkid) {
    try {
      $db->query("UPDATE login SET 'password' = '$password', 'name' = '$name', 'auth' = '$auth', 'email' = '$email' WHERE id = '$id' ");
    } catch (\Exception $e) {
      flash($e->getMessage(), 'red');
    }
    flash("Updated. Please login and change your password", 'green');
  } else {
    flash('Failed to update Unknow email', 'red');
  }
} else if($s_a === 'Delete'){
  if($checkid) {
    try {
      $db->query("DELETE FROM login WHERE id = '$id' ");
    } catch (\Exception $e) {
      flash($e->getMessage(), 'red');
    }
    flash('Delete Successfully', 'green');
  } else {
    flash('Failed to remove account Unknow account', 'red');
  }
} else if ($s_a === 'Cancel') {
    flash('Cancelled changes', 'red');
} else {
    flash('Something Went very wrong with.' . $s_a, 'red');
}
header('Location: ../sign_up');
