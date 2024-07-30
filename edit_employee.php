<?php
include 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($query);
    $employee = $result->fetch_assoc();
}

if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $offdays = $_POST['offdays'];
    $img = $employee['img'];

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

    $query = "UPDATE employees SET name='$name', salary='$salary', offdays='$offdays', img='$img' WHERE id=$id";
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
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Employee</h2>
        <form action="edit_employee.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" class="form-control" id="salary" name="salary" value="<?php echo $employee['salary']; ?>" required>
            </div>
            <div class="form-group">
                <label for="offdays">Offdays:</label>
                <input type="number" class="form-control" id="offdays" name="offdays" value="<?php echo $employee['offdays']; ?>" required>
            </div>
            <div class="form-group">
                <label for="uploadedimage">Image:</label>
                <input type="file" class="form-control" id="uploadedimage" name="uploadedimage">
            </div>
            <button type="submit" name="edit" class="btn btn-primary">Update Employee</button>
            <a href="admin_dashboard.php" class="btn btn-danger ">Cancel</a>
        </form>
    </div>
</body>
</html>
