<?php
include "connect.php";
$result = mysqli_query($conn, "SELECT * FROM employees ORDER BY emp_id ASC");
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<body>
<h2>Employees Records</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>{$row['emp_id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['department']}</td>
        <td>{$row['salary']}</td>
        <td>
            <a href='edit.php?id={$row['emp_id']}'>Edit</a> |
            <a href='delete.php?id={$row['emp_id']}'>Delete</a>
        </td>
    </tr>";
    }
    ?>
</table>
<br>
<a href="insert.php">Add New Record</a>

</body>
</html>
