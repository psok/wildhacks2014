<?php
$con = mysqli_connect('localhost','root','root','R8Dr');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"R8Dr");
$sql = "SELECT * FROM hospital";

$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) == 0){
	echo "<div class='col-md-6'>";
	echo "<select name='specialties' id='byspecialty'>";
    echo "<option selected value='0'>Select Specialty</option>";
    echo "<option value='1'>Oncology</option>";
    echo "<option value='2'>Opthamology</option>";
    echo "<option value='3'>Geriatrics</option>";
    echo "<option value='4'>Ears, Nose, and Throat</option>";
    echo "<option value='5'>Neurology</option>";
    echo "<option value='6'>Psychiatry</option>";
    echo "<option value='7'>Infectious Diseases</option>";
    echo "<option value='8'>Rehabilitation</option>";
    echo "<option value='9'>Urology</option>";
	echo "</select>";
	echo "</div>"
}
else {
	while($row = mysqli_fetch_array($result)) {
		echo "<p></p>";	
	}
	
}

mysqli_close($con);
?>