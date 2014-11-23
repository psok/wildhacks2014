<?php
$comment = $_GET['comment'];
$rating = $_GET['rating'];
$doctor = $_GET['doctor'];
//echo $specialty."    ".$hospital;
$con = mysqli_connect('localhost','root','root','R8Dr');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"R8Dr");
$sql = "INSERT INTO table_name (doctorid,stars,comments)
VALUES ($doctor,$rating,$comment);";

$result = mysqli_query($con,$sql);
echo $sql;

mysqli_close($con);
?>