<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM employees WHERE id=$id";
    if ($conn->query($query) === TRUE) {
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
