<?php
include("connect.php");
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM record WHERE id=$id");
 
mysqli_close($conn);
header("Location: view.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete customer data</title>
</head>
<body>
    <h2>Delete Customer Data</h2>
    <form method="post" action="">
        <p>Are you sure you want to delete the following record?</p>
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
        <input type="submit" name="delete" value="Delete">
        <a href="view.php">Cancel</a>
    </form>
</body>
</html>