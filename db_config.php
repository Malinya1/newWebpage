<?php
// db_config.php

$dbHost = 'your_db_host';
$dbUser = 'your_db_username';
$dbPass = 'your_db_password';
$dbName = 'your_db_name';

function connectDatabase() {
    global $dbHost, $dbUser, $dbPass, $dbName;
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>