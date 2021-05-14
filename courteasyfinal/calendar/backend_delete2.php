<?php
require_once '_db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $delete = $conn->prepare("DELETE FROM events where events.court=2");
    
    $delete-> execute(array(':id' => $id));

    header('location:calendar2.php');

}

?>
