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
$sql = "INSERT INTO review (doctorid,stars,comments)";
$sql .= "VALUES ($doctor,$rating,'".$comment."')";
$result = mysqli_query($con,$sql);

echo "Thanks for your review";
mysqli_close($con);
?>