<?php
include 'config.php';

// Fetch card data
$max_salary_query = "SELECT MAX(salary) AS max_salary FROM employees";
$max_salary_result = $conn->query($max_salary_query);
$max_salary = $max_salary_result->fetch_assoc()['max_salary'];

$min_salary_query = "SELECT MIN(salary) AS min_salary FROM employees";
$min_salary_result = $conn->query($min_salary_query);
$min_salary = $min_salary_result->fetch_assoc()['min_salary'];

$total_salary_query = "SELECT SUM(salary) AS total_salary FROM employees";
$total_salary_result = $conn->query($total_salary_query);
$total_salary = $total_salary_result->fetch_assoc()['total_salary'];

$total_employees_query = "SELECT COUNT(*) AS total_employees FROM employees";
$total_employees_result = $conn->query($total_employees_query);
$total_employees = $total_employees_result->fetch_assoc()['total_employees'];

// Fetch employee data
$employees_query = "SELECT * FROM employees";
$employees_result = $conn->query($employees_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Highest Salary</h5>
                        <p class="card-text"><?php echo $max_salary; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Lowest Salary</h5>
                        <p class="card-text"><?php echo $min_salary; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sum of Salaries</h5>
                        <p class="card-text"><?php echo $total_salary; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Employees</h5>
                        <p class="card-text"><?php echo $total_employees; ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <h2 class="mt-4">Employee Table</h2>
        <a href="add_employee.php" class="btn btn-success mt-3">Add Employee</a>
        <a href="update_salary.php?" class="btn btn-warning mt-3">Update Salary</a>
        <a href="calculate_salary.php" class="btn btn-info mt-3">Calculate Salary</a>
        <a href="search.php" class="btn btn-primary mt-3">Search Employee</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Offdays</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $employees_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['offdays']; ?></td>
                    <td><img src="<?php echo $row['img']; ?>" width="50" height="50"></td>
                    <td>
                        <a href="edit_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-larg ml-2 ">Edit</a>
                        <a href="delete_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-larg ml-2">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>
