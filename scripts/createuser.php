<?php
$con = mysqli_connect('localhost','root','root','R8Dr');

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"R8Dr");

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['confirmpassword'];
echo "something";
$sql = "INSERT INTO users (email, password, cpassword)
VALUES ('$username', '$password', '$cpassword')";

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0){
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($con);
?>