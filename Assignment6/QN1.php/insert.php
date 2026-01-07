<?php

include("connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['phone'];

$sql = "INSERT INTO record(name,email,phone) VALUES('$name','$email','$phone')";

if(mysqli_query($conn,$sql))
header(header:"Location:view.php"); 


}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Insert Customer Details</h2>

<form method="post">
 Name: <input type ="text" name="name" required> <br><br>
 Email:<input type ="email" name="email" required><br><br>
 Phone:<input type ="text" name="phone" required><br><br>
 <input type="submit" name="submit" value="Insert">

 </form>


</body>
</html>