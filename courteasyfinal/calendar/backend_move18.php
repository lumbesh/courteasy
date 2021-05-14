<?php
require_once '_db.php';

$stmt = $conn->prepare('SELECT * FROM events where events.court=31');

$stmt->bindParam(':start', $_GET['start']);
$stmt->bindParam(':end', $_GET['end']);

$stmt->execute();
$result = $stmt->fetchAll();

class Event {}
$events = array();

foreach($result as $row) {
  $e = new Event();
  $e->id = $row['id'];
  $e->text = $row['etc'];
  $e->start = $row['start'];
  $e->end = $row['end'];
  $events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);

?>
