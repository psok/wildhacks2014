<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "R8Dr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$email = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);
$cpassword = strip_tags($_POST['confirmpassword']);

$sql = "INSERT INTO users (email, password, cpassword)
VALUES ('$email', '$password', '$cpassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>