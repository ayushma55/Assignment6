<?php   
$servername ="localhost";
$username = "root";
$password = "";
$database = "Company";


// create a connection

$conn = mysqli_connect($servername,$username,$password,$database);

//check connection

if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

echo "connected successfully";

?>