<?php
$q = $_GET['q'];
$specialty = $_GET['byspecialty'];
$hospital = $_GET['byhospital'];
$con = mysqli_connect('localhost','root','root','R8Dr');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"R8Dr");
$sql = "";

$sql = "SELECT * FROM doctor INNER JOIN hospital ON doctor.id = hospital.id ";
$sql .= "INNER JOIN specialty ON doctor.id = specialty.id";
$sql .= " WHERE doctor.name LIKE '%" . $q . "%'";
$sql .= " OR hospital.name LIKE '%" . $q . "%'";
$sql .= " OR specialty.description LIKE '%" . $q . "%'";

if($specialty != '0') {
	$sql .= " AND specialty.name='" . $specialty ."'";
}

if($hospital != '0') {
	$sql .= " AND hospital.name='" . $hospital ."'";
}

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) == 0){
	echo "<p>Result not found.</p>";
}
else {
	while($row = mysqli_fetch_array($result)) {
		echo "<p></p>";	
	}
	
}

mysqli_close($con);
?>