<?php
session_start();
include 'functions_database.php';
$login_details = login_details();
$id = $login_details['sub'];

// which month load on to
$month_value = filter_input(INPUT_POST, 'month_value', FILTER_SANITIZE_STRING);
// Which page load onto.
$page_name = filter_input(INPUT_POST, 'page_name', FILTER_SANITIZE_STRING);

// page name URL name filtered
$page_name = filter_page_name($page_name);

// file ext
$type = $_FILES['f1']['type'];
$file_name = $_FILES['f1']['name'];
$file_name = explode('.', $file_name);
$file_ext = strtolower(end($file_name));


// create file name.
$file_temp_name = $_FILES['f1']['tmp_name'];
$uniqid = uniqid('');
$file_new_name = __DIR__ .'/../uploads/'. $uniqid . '.' . $file_ext;


// Get any error and size
$error = $_FILES['f1']['error'];
$size = $_FILES['f1']['size'];


// error check
if ($error === 1) {
  $_SESSION['flash'] = 'There was an error with the upload';
  $_SESSION['flash_colour'] = 'red';
}

// save file to data and folder.
if($file_ext === 'pdf' &&  $size < 1000000) {
  move_uploaded_file($file_temp_name, $file_new_name);
  $pdf_files = $db->query("INSERT INTO pdf VALUES('$page_name', '$month_value', '$uniqid')");
  $_SESSION['flash'] = 'Your File was uploaded.';
  $_SESSION['flash_colour'] = 'green';
} else {
  $_SESSION['flash'] = 'ERROR: You can only upload PDF files or your file is to large.';
  $_SESSION['flash_colour'] = 'red';
}

header("location: /../$page_name");
exit();
