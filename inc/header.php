<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/flash.css">
    <link rel="stylesheet" href="css/<?=$css?>.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- font-family: 'Open Sans', sans-serif; -->
    <title><?= $title ?></title>
  </head>
  <body>
    <?php include 'controller/flash.php'?>
    <header>
      <?= "<h1 class='hi'><a href='menu'>Welcome " . $login_details['name'] . "</a></h1>" ?>
      <nav class="nav">
        <a href="menu"> <p>Menu</p> </a>
        <a href="../controller/logout.php"> <p>Logout</p> </a>
      </nav>
    </header>
