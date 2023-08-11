<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'contact'; 

// Create the database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo 'connection ok';
}

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $message = $_POST['message'];

    // You should perform input validation and sanitization here
    
    $sql = "INSERT INTO form (email, message) VALUES ('$email', '$message')";
    
    if ($conn->query($sql) === true) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Close the database connection
$conn->close();
?>