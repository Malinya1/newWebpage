<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Page</title>
</head>
<body>
    <h1>Welcome to the Secure Page</h1>
    <p>This page can only be accessed by authenticated users.</p>
    <a href="logout.php">Logout</a>
</body>
</html>