<?php
$username = "root";
$password = "";

// Create connection
$conn = new PDO("mysql:host=localhost;dbname=courteasyfinal", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
    

?>