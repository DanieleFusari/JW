<?php

include 'functions_database.php';
$login_details = login_details();
$id = $login_details['sub'];

if ($login_details['auth'] !== 'E') {
  flash('NOT AUTHRISED LOGGED OUT', 'red');
  setcookie('token', 'hello', time() - 1,  '/');
  header('Location: /');
  exit();
}

$dateFrom = filter_input(INPUT_POST, 'dateFrom', FILTER_SANITIZE_STRING);
$dateTo = filter_input(INPUT_POST, 'dateTo', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

if ($name === 'all') {
	$recordes = $db->query("SELECT name,
			sum(hours) AS hours,
			sum(placements) AS placements,
			sum(videos) AS videos,
			sum(studies) AS studies,
			sum(return_visits) AS return_visits
			FROM ministry
			JOIN login ON ministry.id = login.id
			WHERE date BETWEEN '$dateFrom' AND '$dateTo' GROUP BY name;");
			$recordes = $recordes->fetchAll(PDO::FETCH_ASSOC);
} else {
	$recordes = $db->query("SELECT name,
			sum(hours) AS hours,
			sum(placements) AS placements,
			sum(videos) AS videos,
			sum(studies) AS studies,
			sum(return_visits) AS return_visits
			FROM ministry
			JOIN login ON ministry.id = login.id
			WHERE date BETWEEN '$dateFrom' AND '$dateTo' AND name = '$name';");
	$recordes = $recordes->fetch(PDO::FETCH_ASSOC);
}

$recordesT = $db->query("SELECT  sum(hours) AS hours,
		sum(placements) AS placements,
		sum(videos) AS videos,
		sum(studies) AS studies,
		sum(return_visits) AS return_visits
		FROM ministry
		WHERE date BETWEEN '$dateFrom' AND '$dateTo';");
$recordesT = $recordesT->fetch(PDO::FETCH_ASSOC);

$rec= [];
array_push($rec,  $recordes, $recordesT);
$trecordes = json_encode($rec);

echo $trecordes;
