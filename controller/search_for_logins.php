<?php

include 'functions_database.php';
$login_details = login_details();

$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);

$check = $db->query("SELECT id, email, name, auth FROM login WHERE  name like '%$name%' ");
$check = $check->fetchAll(PDO::FETCH_ASSOC);

$check = json_encode($check);

echo $check;
