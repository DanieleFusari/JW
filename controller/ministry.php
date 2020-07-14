<?php
include 'functions_database.php';
$login_details = login_details();
$id = $login_details['sub'];
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$minutes = filter_input(INPUT_POST, 'minutes', FILTER_SANITIZE_NUMBER_INT);
$placments = filter_input(INPUT_POST, 'placments', FILTER_SANITIZE_NUMBER_INT);
$video = filter_input(INPUT_POST, 'video', FILTER_SANITIZE_NUMBER_INT);
$studies = filter_input(INPUT_POST, 'studies', FILTER_SANITIZE_NUMBER_INT);
$returnVisits = filter_input(INPUT_POST, 'returnVisits', FILTER_SANITIZE_NUMBER_INT);
$partner = filter_input(INPUT_POST, 'partner', FILTER_SANITIZE_STRING);

$delete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING);

if ($_POST['action'] === 'add') {
  $add = $db->query("INSERT INTO ministry VALUES(null, '$id', '$date', '$minutes', '$placments', '$video', '$studies', '$returnVisits', '$partner')");
  $_SESSION['flash'] = 'Recorde Update Successfully';
  $_SESSION['flash_colour'] = 'green';
} elseif ($_POST['action'] === 'delete') {
  $add = $db->query("DELETE FROM ministry WHERE minid = '$delete' AND id = '$id'");
  $_SESSION['flash'] = ' Recorder ' .  $delete . ' Deleted ';
  $_SESSION['flash_colour'] = 'red';
}

header('Location: /../ministry');
exit();
