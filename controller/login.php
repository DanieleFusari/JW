<?php
session_start();
include 'functions_database.php';
use \Firebase\JWT\JWT;
JWT::$leeway = 60; // $leeway in seconds

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$email = strtolower($email);

if (!empty($email)) {
  $results = $db->query("SELECT * FROM login WHERE email = '$email' ");
  $results = $results->fetch(PDO::FETCH_ASSOC);
}

if($results && password_verify($password, $results['password'])) {
  $payload = array(
      "iss" => $_SERVER['SERVER_NAME'],
      'sub' => $results['id'],
      'exp' => time() + 3600,
      'iat' => time(),
      'nbf' => time(),
      'name' => $results['name'],
      'email' => $results['email'],
      'auth' => $results['auth']
  );
  $jwt = JWT::encode($payload, $_ENV['SECRET_KEY'], 'HS256');
  setcookie('token', $jwt, time()+ 3600, '/');
  if (password_verify($_ENV['passwordReset'], $results['password']) ) {
    flash("You need to reset your password", 'red');
    header('Location: /../change_password.php');
    exit();
  }
  flash("Logged in Successfully", 'green');
  header('Location: /menu');
  exit();
} else {
  flash(' Email or Password are incorrect try again or see your group oversear ', 'red');
  header('Location: /');
  exit();
}

?>
