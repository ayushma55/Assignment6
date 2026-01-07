<?php
include "connect.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM employees WHERE emp_id=$id");

mysqli_close($conn);

header("Location: view.php");
?>


