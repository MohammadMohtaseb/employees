<?php
include 'config.php';

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $offdays = $_POST['offdays'];
    $img = "img/users/default.png"; // Default image

    if(!empty($_FILES["uploadedimage"]["name"])) {
        $file_name = $_FILES["uploadedimage"]["name"];
        $temp_name = $_FILES["uploadedimage"]["tmp_name"];
        $imgtype = $_FILES["uploadedimage"]["type"];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $imagename = uniqid() . '.' . $ext;
        $img = "img/users/" . $imagename;

        if(!file_exists('img/users')) {
            mkdir('img/users', 0755, true);
        }

        move_uploaded_file($temp_name, $img);
    }

    $query = "INSERT INTO employees (name, salary, offdays, img) VALUES ('$name', '$salary', '$offdays', '$img')";
    if($conn->query($query) === TRUE) {
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Add Employee</h2>
        <form action="add_employee.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" class="form-control" id="salary" name="salary" required>
            </div>
            <div class="form-group">
                <label for="offdays">Offdays:</label>
                <input type="number" class="form-control" id="offdays" name="offdays" required>
            </div>
            <div class="form-group">
                <label for="uploadedimage">Image:</label>
                <input type="file" class="form-control" id="uploadedimage" name="uploadedimage">
            </div>
            <button type="submit" name="add" class="btn btn-success">Add Employee</button>
            <a href="admin_dashboard.php" class="btn btn-danger ">Cancel</a>
        </form>
    </div>
</body>
</html>
