<?php
include 'config.php';

if (isset($_POST['update_salary'])) {
    $id = $_POST['id'];
    $change_amount = $_POST['change_amount'];
    $action = $_POST['action'];
    $is_all_employees = isset($_POST['all_employees']);

    if ($action == 'decrease') {
        $change_amount = -$change_amount;
    }

    if ($is_all_employees) {
        $query = "UPDATE employees SET salary = salary + $change_amount";
    } else {
        $query = "UPDATE employees SET salary = salary + $change_amount WHERE id=$id";
    }

    if ($conn->query($query) === TRUE) {
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
    <title>Update Salary</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
        }
        h2 {
            color: red;
            text-align: center;
        }
        button {
            width: 100px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Employees Information</h2>
        <h4>Update Salary</h4>
        <form action="update_salary.php" method="post">
            <div class="form-group">
                <label for="change_amount">Amount:</label>
                <input type="number" class="form-control" id="change_amount" name="change_amount" required>
            </div>
            <div class="form-group">
                <label for="action">Action:</label>
                <select class="form-control" id="action" name="action" required>
                    <option value="increase">Increase</option>
                    <option value="decrease">Decrease</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id">Employee id:</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="all_employees" name="all_employees">
                <label class="form-check-label" for="all_employees">All employees</label>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="update_salary" class="btn btn-success">Update</button>
                <a href="admin_dashboard.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
