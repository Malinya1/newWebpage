<!DOCTYPE html>
<html>
<head>
    <title>Projects List</title>
</head>
<body>
    <h1>Projects List</h1>

    <?php
    require_once 'functions.php';

    // Retrieve projects from the database
    $projects = getProjects();
    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            
        </tr>
        <?php foreach ($projects as $project): ?>
        <tr>
            <td><?php echo $project['id']; ?></td>
            <td><?php echo $project['title']; ?></td>
            <td><?php echo $project['description']; ?></td>
            <td><?php echo $project['image']; ?></td>
            
            <td>
                <a href="update_form.php"><input type="submit" value="Edit"></a> 
                <a href="delete_project.php?id=<?php echo $project['id']; ?>"><input type="submit" value="Delete"></a>
        </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>