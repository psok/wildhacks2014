<?php
$con = mysqli_connect('localhost','root','root','R8Dr');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"R8Dr");

$insert_array = $_POST['speciality'];

$stringCondition = '';
$numItem = count($insert_array);
$i=0;
foreach($insert_array as $item) {
	$stringCondition .= "'" . $item . "'";
	if(++$i !== $numItem) {
		$stringCondition .= ",";
	}
}

$sql = "SELECT * FROM specialty WHERE description IN (".$stringCondition.")";

#echo $sql;

$result = mysqli_query($con,$sql);
$count = mysql_num_rows($result);

echo $count;

while ($tableRow = mysql_fetch_assoc($result)) {

		echo $tableRow['id'];
		echo "hello";
	}

?>