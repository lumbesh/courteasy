<?php
require_once '_db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $delete = $conn->prepare("DELETE FROM events ORDER BY ID DESC LIMIT 1");
    
    $delete-> execute(array(':id' => $id));

    header('location:calendar6.php');

}

?>
