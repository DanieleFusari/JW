<?php
session_start();
include 'functions_database.php';
$login_details = login_details();
$id = $login_details['sub'];


$month_value = filter_input(INPUT_POST, 'month', FILTER_SANITIZE_STRING);
$page_name = filter_input(INPUT_POST, 'which_page', FILTER_SANITIZE_STRING);

$page_name = filter_page_name($page_name);

$pdf_files = $db->query("SELECT file FROM pdf WHERE page = '$page_name' AND month = '$month_value';");
$pdf_files = $pdf_files->fetchAll(PDO::FETCH_ASSOC);

$pdf_files = json_encode($pdf_files);

echo $pdf_files;
