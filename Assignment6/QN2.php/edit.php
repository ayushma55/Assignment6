<?php
include "connect.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM employees WHERE emp_id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name  = $_POST['name'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    mysqli_query($conn, "UPDATE employees 
        SET name='$name', department='$department', salary='$salary'
        WHERE emp_id=$id");

    mysqli_close($conn);
    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Edit Employees Details</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Department: <input type="text" name="department" value="<?php echo $row['department']; ?>" required><br><br>
    Salary: <input type="float" name="salary" value="<?php echo $row['salary']; ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>

</body>
</html>
