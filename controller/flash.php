<?php
session_start();
if (isset($_SESSION['flash']) ) {
  if ($_SESSION['flash_colour'] === 'red') {
    echo "<h1 class=' flash flash_red'>" . $_SESSION['flash'] . "</h1>";
  } else if($_SESSION['flash_colour'] === 'green'){
    echo "<h1 class=' flash flash_green'>" . $_SESSION['flash'] . "</h1>";
  } else {
    echo "<h1 class='flash'>" . $_SESSION['flash'] . "</h1>";
  }
  unset($_SESSION['flash']);
  echo "<script src='../js/flash.js' type='text/javascript'></script>";
};

?>
