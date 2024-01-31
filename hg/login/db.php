<?php

$db_host = "127.0.0.1:3306";
$db_user = "root";
$db_password = ""; // Leave this empty if no password is set
$db_name = "hg";

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
