<?php
include 'config.php';

$search = '';
if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM employees WHERE name LIKE '%$search%' OR id LIKE '%$search%'";
    $result = $conn->query($query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Search Employees</h2>
        <form action="search.php" method="post">
            <div class="form-group">
                <label for="search">Search by Name or ID:</label>
                <input type="text" class="form-control" id="search" name="search" required>
            </div>
            <button type="submit" class="btn btn-success">Search</button>
            <a href="admin_dashboard.php" class="btn btn-danger ">Cancel</a>
        </form>
        <?php if(isset($result) && $result->num_rows > 0): ?>
        <h2 class="mt-4">Search Results</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Offdays</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['offdays']; ?></td>
                    <td><img src="<?php echo $row['img']; ?>" width="50" height="50"></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
        <?php endif; ?>
    </div>
    
</body>
</html>
