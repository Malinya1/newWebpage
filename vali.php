<!DOCTYPE html>
<html>
<head>
    <title>Project Form</title>
    <style>
      body {
  align-items: center;
  background-color: #000;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.form {
  background-color:pink;
  border-radius: 20px;
  box-sizing: border-box;
  height: 500px;
  padding: 20px;
  width: 320px;
}

.title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: #eee;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 10px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}

.input {
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 50%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}

.cut {
  background-color: #15172b;
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}

.cut-short {
  width: 50px;
}

.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}

.placeholder {
  color: #65657b;
  font-family: sans-serif;
  left: 20px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 20px;
}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

.input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
}

.input:focus ~ .placeholder {
  color: #dc2f55;
}

.submit {
  background-color: #08d;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 30px;
  // outline: 0;
  text-align: center;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}

    </style>
</head>
<body>

<div class="form">
      <div class="title">Welcome</div>
      <div class="subtitle">Let's Fill </div>
      <div class="input-container ic1">
    <h1>Project Form</h1>

    <?php
    require_once 'functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['projectName'];
        $description = $_POST['projectDescription'];
        $image = $_POST['projectImage'];

        $validationErrors = validateForm($_POST);

        if (empty($validationErrors)) {
            if (insertProject($title, $description, $image)) {
                echo "<p style='color: green;'>Project added successfully!</p>";
            } else {
                echo "<p style='color: red;'>Failed to add project.</p>";
            }
        } else {
            foreach ($validationErrors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="input-container ic1">   
    <label for="projectName">Project Name:</label>
        
        <input type="text" name="projectName" id="projectName">
        <br><br>

        <label for="projectDescription">Project Description:</label>
        <div class="input-container ic2">
        <textarea name="projectDescription" id="projectDescription" rows="4"></textarea>
        <br>
        <div class="input-container ic2">
        <label for="projectImage" >Project Image:</label>
        <input type="text" name="projectImage" id="projectImage">
      </div>
        <br>

        <input type="submit" value="Submit">
        <a href="view.php" data-after="form">
        <input type="button"  value="view">
					</a>
    </form>

    
</body>
</html>
</body>
</html>