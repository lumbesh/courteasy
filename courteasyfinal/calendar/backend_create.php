<?php
require_once '_db.php';

$insert = "INSERT INTO events (name, start, end, court ,eventsid, etc) VALUES (:name, :start, :end, :court ,:eventsid,:etc)";

$stmt = $conn->prepare($insert);

$stmt->bindParam(':start', $_POST['start']);
$stmt->bindParam(':end', $_POST['end']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':court', $_POST['court']);
$stmt->bindParam(':eventsid', $_POST['eventsid']);
$stmt->bindParam(':etc', $_POST['etc']);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Created with id: '.$conn->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);

?>
