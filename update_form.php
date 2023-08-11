<!DOCTYPE html>
<html>
<head>
    <title>Update Project</title>
</head>
<body>
    <h1>Update Project</h1>

    <?php
    require_once 'functions.php';

    // Check if project ID is provided in the URL
    if (isset($_GET['id'])) {
        $projectId = $_GET['id'];

        // Retrieve project by ID
        $project = getProjectById($projectId);

        if (!$project) {
            echo "<p style='color: red;'>Project not found.</p>";
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = $_POST['projectName'];
                $description = $_POST['projectDescription'];
                $image = $_POST['projectImage'];

                $validationErrors = validateForm($_POST);

                if (empty($validationErrors)) {
                    if (updateProject($projectId, $title, $description, $image)) {
                        echo "<p style='color: green;'>Project updated successfully!</p>";
                    } else {
                        echo "<p style='color: red;'>Failed to update project.</p>";
                    }
                } else {
                    foreach ($validationErrors as $error) {
                        echo "<p style='color: red;'>$error</p>";
                    }
                }
            }
        }
    } else {
        echo "<p style='color: red;'>Project ID not provided.</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $projectId); ?>">
        <label for="projectName">Project Name:</label>
        <input type="text" name="projectName" id="projectName" value="<?php echo $project['title']; ?>">
        <br>

        <label for="projectDescription">Project Description:</label>
        <textarea name="projectDescription" id="projectDescription" rows="4"><?php echo $project['description']; ?></textarea>
        <br>

        <label for="projectImage">Project Image:</label>
        <input type="text" name="projectImage" id="projectImage" value="<?php echo $project['image']; ?>">
        <br>

        
        <a href="view.php"><input type="submit" value="Update"></a> 
    </form>
</body>
</html>
