<?php
// auth_functions.php

require_once 'db_config.php';

function registerUser($username, $password) {
    $conn = connectDatabase();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
    mysqli_close($conn);
}

function loginUser($username, $password) {
    $conn = connectDatabase();
    $sql = "SELECT password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $hashedPasswordFromDB = $row['password'];
        if (password_verify($password, $hashedPasswordFromDB)) {
            return true;
        }
    }
    return false;
    mysqli_close($conn);
}
?>