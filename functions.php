<?php
// functions.php

// Function to perform form validation and return an array of error messages
function validateForm($formData) {
    $errors = array();

    if (empty($formData['projectName'])) {
        $errors[] = "Project name is required.";
    }

    if (empty($formData['projectDescription'])) {
        $errors[] = "Project description is required.";
    }

    // Add more validation rules as needed

    return $errors;
}

// Function to establish a database connection and return the connection object
function connectDatabase() {
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'projectform';

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to insert project details into the database
function insertProject($title, $description, $image) {
    $conn = connectDatabase();

    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $image = $conn->real_escape_string($image);

    $sql = "INSERT INTO projects (Title, Description, Image) VALUES ('$title', '$description', '$image')";
    
    if ($conn->query($sql) === true) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}


// Function to retrieve project data from the database
function getProjects() {
    $conn = connectDatabase();
    $projects = array();

    $sql = "SELECT * FROM projects";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    $conn->close();
    return $projects;
}

// Function to update project information in the database
function updateProject($id, $title, $description, $image) {
    $conn = connectDatabase();

    $title = $conn->real_escape_string($title);
    $description = $conn->real_escape_string($description);
    $image = $conn->real_escape_string($image);

    $sql = "UPDATE projects SET Title='$title', Description='$description', Image='$image' WHERE ID='$id'";

    if ($conn->query($sql) === true) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

// Function to delete a project from the database
function deleteProject($id) {
    $conn = connectDatabase();

    $sql = "DELETE FROM projects WHERE ID='$id'";

    if ($conn->query($sql) === true) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

// Add your custom functions here based on your requirements

function getProjectById($projectId) {
    $conn = connectDatabase();

    $projectId = $conn->real_escape_string($projectId);

    $sql = "SELECT * FROM projects WHERE ID = '$projectId'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $project = $result->fetch_assoc();
        return $project;
    } else {
        return null;
    }

    $conn->close();
}

?>