<?php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees(name, department, salary)
            VALUES ('$name', '$department', '$salary')";

    if (mysqli_query($conn, $sql)) {
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Employee</title>
</head>
<body>
    <h2>Insert Employee Details</h2>

    <form method="post">
        Name:
        <input type="text" name="name" required><br><br>

        Department:
        <input type="text" name="department" required><br><br>

        Salary:
        <input type="number" step="0.01" name="salary" required><br><br>

        <input type="submit" value="Insert">
    </form>
</body>
</html>

