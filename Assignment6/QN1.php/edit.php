<?php
include "connect.php";
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM record WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    mysqli_query($conn, "UPDATE record 
        SET name='$name', email='$email', phone='$phone'
        WHERE id=$id");

    mysqli_close($conn);
    header("Location: view.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit customer details</title>
</head>
<body>
    <h2>Edit Customer Details</h2>
    <form method="post" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>
        
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>

