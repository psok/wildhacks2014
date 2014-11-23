<?php
$doctor = $_GET['doctor'];
$con = mysqli_connect('localhost','root','root','R8Dr');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"R8Dr");
$sql = "SELECT * FROM review WHERE doctorid=".$doctor;
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) == 0){
    echo "<div class='row reviewSection'>";
                echo "<div class='row'>";
                    echo "<h1><strong>Reviews:</strong></h1><br>";
                echo "</div>";
}
else {
    echo "<div class='row'>";
                echo "<div class='col-md-offset-4 col-md-4'>";
                    echo "<h1><strong>Reviews:</strong></h1><br>";
                echo "</div>";
                echo "</div>";
                echo "<div class='row'>";
    while($row = mysqli_fetch_array($result)) {
        $check = array('0' => "src='img/EmptyStar.png'",'1' => "src='img/EmptyStar.png'", '2' => "src='img/EmptyStar.png'", '3' => "src='img/EmptyStar.png'", '4' => "src='img/EmptyStar.png'");

        $star = intval($row['stars']);
        for($i=0; $i<5 ;$i++) {
            if($i<$star) $check[$i] = "src='img/FilledStar.png'";
        }

                    echo "<div class='col-md-offset-4 col-md-4'>";
                        echo "<strong>Review #".$row['id'].":</strong><br>";
                        echo "<div class='ratingdoctor'>";
                          echo "<span><img ".$check[0]." width='15' height='15'></span>";
                          echo "<span><img ".$check[1]." width='15' height='15'></span>";
                          echo "<span><img ".$check[2]." width='15' height='15'></span>";
                          echo "<span><img ".$check[3]." width='15' height='15'></span>";
                          echo "<span><img ".$check[4]." width='15' height='15'></span>";
                          echo "</div>";
                        echo "<div>".$row['comments']."</div>";
                    echo "</div>";
            
    }
    echo "</div>";
}
                

mysqli_close($con);
?>