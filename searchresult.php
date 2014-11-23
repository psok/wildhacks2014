<?php
$q = $_GET['q'];
$specialty = $_GET['specialty'];
$hospital = $_GET['hospital'];
//echo $specialty."    ".$hospital;
$con = mysqli_connect('localhost','root','root','R8Dr');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"R8Dr");
$sql = "";

$sql = "SELECT * FROM doctor INNER JOIN hospital ON doctor.hospitalid = hospital.id ";
$sql .= "INNER JOIN specialty ON doctor.specialtyid = specialty.id";
$sql .= " WHERE doctor.name LIKE '%" . $q . "%'";
//$sql .= " OR hospital.name LIKE '%" . $q . "%'";
//$sql .= " OR specialty.description LIKE '%" . $q . "%'";

if($specialty != '') {
	$sql .= " AND specialty.description IN (" . $specialty . ")";
}

if($hospital != '') {
	$sql .= " AND hospital.name IN (" . $hospital . ")";
}
$result = mysqli_query($con,$sql);

echo "<div class='row'>";
echo "<div class='col-xs-4 col-md-2'>";
echo "<a href='index.html' class='btn btn-primary btn-block'>Back</a>";
echo "</div>";
echo "</div>";

if (mysqli_num_rows($result) == 0){
	echo "<p class='search-title'><img src='img/SadResultsMan.png' width='200' height='200'></p>";

   
}
else {
   
   echo "<p class='search-title'><img src='img/ResultsMan.png' width='200' height='200'></p>";
   echo "<hr>";
   echo "<table class='table table-hover'>";
   echo "<tbody>";

	while($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>";
      echo "<div class='row-result'>";
      echo "<div class='row-title'><a href='".$row['5']."' target='_blank'>" . $row['1'] . "</a></div>";
      echo "<div class='row-specialty'>".$row['10']."</div>";
      echo "<div class='row-description'>".$row['7']."</div>";
      echo "<div class='rating'>";
      echo "<span><img src='img/FilledStar.png' width='15' height='15'></span>";
      echo "<span><img src='img/FilledStar.png' width='15' height='15'></span>";
      echo "<span><img src='img/FilledStar.png' width='15' height='15'></span>";
      echo "<span><img src='img/FilledStar.png' width='15' height='15'></span>";
      echo "<span><img src='img/EmptyStar.png' width='15' height='15'></span>";
      echo "</div>";
      echo "</div>";
      echo "</td>";
      echo "</tr>";              
	}
   echo "</tbody>";
   echo "</table>";
	
}

mysqli_close($con);
?>