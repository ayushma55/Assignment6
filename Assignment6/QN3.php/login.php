<?php
session_start();
include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>

<h2>Login</h2>

<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" name="login" value="Login">
</form>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name'];
        echo "Login successful! Welcome " . $_SESSION['user'];
    } else {
        echo "Invalid email or password!";
    }
}
?>

</body>
</html>
