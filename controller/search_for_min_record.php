<?php

include 'functions_database.php';
$login_details = login_details();
$id = $login_details['sub'];

$dateFrom = filter_input(INPUT_POST, 'dateFrom', FILTER_SANITIZE_STRING);
$dateTo = filter_input(INPUT_POST, 'dateTo', FILTER_SANITIZE_STRING);

$recordes = $db->query("SELECT * FROM ministry WHERE id = '$id' AND date BETWEEN '$dateFrom' AND '$dateTo' ");
$recordes = $recordes->fetchAll(PDO::FETCH_ASSOC);

$recordesT = $db->query("SELECT 	SUM(hours) AS hours,
		SUM(placements) AS placements,
		SUM(videos) AS videos,
		SUM(studies) AS studies,
		SUM(return_visits) AS return_visits FROM ministry WHERE id = '$id' AND date BETWEEN '$dateFrom' AND '$dateTo'");
$recordesT = $recordesT->fetchAll(PDO::FETCH_ASSOC);

$rec= [];
array_push($rec,  $recordes, $recordesT);
$recordes = json_encode($rec);

echo $recordes;
