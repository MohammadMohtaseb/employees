<?php
include 'config.php';

if (isset($_POST['calculate_salary'])) {
    $id = $_POST['id'];
    $offdays = $_POST['offdays'];
    $query = "SELECT salary FROM employees WHERE id=$id";
    $result = $conn->query($query);
    $employee = $result->fetch_assoc();

    if ($employee) {
        $daily_salary = $employee['salary'] / 30;
        $deduction = $offdays * $daily_salary;
        $final_salary = $employee['salary'] - $deduction;

        echo "<div class='alert alert-info mt-4'>Final Salary for Employee ID $id is: $final_salary</div>";
    } else {
        echo "<div class='alert alert-danger mt-4'>Employee not found.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Salary</title>
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
        .result {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Employees Information</h2>
        <h4>Calculate Salary</h4>
        <form action="calculate_salary.php" method="post">
            <div class="form-group">
                <label for="id">Employee ID:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="offdays">Offdays:</label>
                <input type="number" class="form-control" id="offdays" name="offdays" required>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="calculate_salary" class="btn btn-success">Calculate</button>
                <a href="admin_dashboard.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        
    </div>
</body>
</html>

