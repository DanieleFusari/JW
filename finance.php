<?php
$css = 'notice_board';
$title = 'Congregation Accounts';
include 'controller/functions_database.php';
$login_details = login_details();
$level = $login_details['auth'];
include 'inc/header.php';
include 'inc/notice_board.php';
?>
