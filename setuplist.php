<?php
$con = mysqli_connect('localhost','root','root','R8Dr');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"R8Dr");
$sql = "SELECT * FROM specialty";

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) == 0){
	echo "<div class='col-md-6'>";
	echo "<select name='specialties' id='byspecialty'>";
    echo "<option selected value='0'>Select Specialty</option>";
    echo "</select>";
	echo "</div>";
}
else {
    echo "<div class='col-md-6'>";
    echo "<select name='specialties' id='byspecialty'>";
    echo "<option selected value='0'>Select Specialty</option>";
	while($row = mysqli_fetch_array($result)) {
		echo "<option selected value='" . $row['description'] . "'>" . $row['description'] . "</option>";
	}
    echo "</select>";
    echo "</div>";
}

$sql = "SELECT * FROM hospital";

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) == 0){
    echo "<div class='col-md-6'>";
    echo "<select name='hospital' id='byhospital'>";
    echo "<option selected value='0'>Select Hospital</option>";
    echo "</select>";
    echo "</div>";
}
else {
    echo "<div class='col-md-6'>";
    echo "<select name='hospitals' id='byhospital'>";
    echo "<option selected value='0'>Select Hospital</option>";
    while($row = mysqli_fetch_array($result)) {
        echo "<option selected value='" . $row['name'] . "'>" . $row['name'] . "</option>";
    }
    echo "</select>";
    echo "</div>";
}

mysqli_close($con);
?>