<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use \Firebase\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

//  for live only
// $host = getenv("host");
// $dbname = getenv("dbname");
// $username = getenv("username");
// $password = getenv("password");

try {
  $db = new PDO('sqlite:' . __DIR__ .'/database.db');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Exception $e) {
  echo $e->getMessage();
}

function filter_page_name($page_name){
  $page_name = explode('/', $page_name);
  $page_name = end($page_name);
  $page_name = explode('.', $page_name);
  $page_name = $page_name[0];
  return $page_name;
}

function flash($mess, $colour){
  $_SESSION['flash'] = $mess;
  $_SESSION['flash_colour'] = $colour;
}

function login_details(){
  if (isset($_COOKIE['token'])) {
    $jwt = $_COOKIE['token'];
    JWT::$leeway = 60; // $leeway in seconds
    $decoded = JWT::decode($jwt, $_ENV['SECRET_KEY'], ['HS256'] );
    return $login_details = json_decode(json_encode($decoded), true);
  } else {
    flash(' Please login first ', 'red');
    header('Location: /');
    exit();
  }
}
