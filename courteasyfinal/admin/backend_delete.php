<?php
require_once 'includes/_db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $delete = $conn->prepare("DELETE FROM events  where id = :id");
    
    $delete-> execute(array(':id' => $id));

    header('location:manage-bookings.php');

}

?>
