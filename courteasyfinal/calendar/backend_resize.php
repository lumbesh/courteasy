<?php
require_once '_db.php';

$insert = "UPDATE events SET start = :start, end = :end WHERE id = :id and status = :status";

$stmt = $db->prepare($insert);

$stmt->bindParam(':start', $_POST['newStart']);
$stmt->bindParam(':end', $_POST['newEnd']);
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':status', $_POST['status']);

$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Update successful';

header('Content-Type: application/json');
echo json_encode($response);

?>
