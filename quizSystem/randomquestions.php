<?php
require 'header.php';
require 'includes/dbh.inc.php';
require 'includes/getcounts.inc.php';


echo '  <div class="box"> 
            <div class="box-content">
                <div class="inner-box">
                    <div class="randq-form">';

//pobranie wszystkich pytan

$q = "SELECT * FROM " . $_GET['table'] . ";";
$result = $conn->query($q);
$questionTab = array();
$counter = 0;

while($row = $result->fetch_assoc()){
	$counter++;
	if($counter <= $countOfQ){
		array_push($questionTab, array($row['id'], $row['pytanie'], $row['prawidlowa'], $row['nieprawidlowa1'], $row['nieprawidlowa2'], $row['nieprawidlowa3']));
	}	
}
shuffle($questionTab);

echo "<form method='post' action='showResult.php'>";

$correctAnswearTab = array();

for($i = 0; $i < $countOfQ; $i++){
	echo $i + 1 . "." . $questionTab[$i][1] . ": <br>";
	
	$questionTabRand = array();	
	
	array_push($correctAnswearTab, $questionTab[$i][2]);
	
	for($j = 0; $j<4; $j++){
		array_push($questionTabRand, $questionTab[$i][$j+2]);
	}
	
	shuffle($questionTabRand);
	
	echo "A: <input type='radio' id='answear1' name='odp" . $i . "' value='" . $questionTabRand[0] . "'>" . $questionTabRand[0] . "<br>";
	echo "B: <input type='radio' id='answear2' name='odp" . $i . "' value='" . $questionTabRand[1] . "'>" . $questionTabRand[1] . "<br>";
	echo "C: <input type='radio' id='answear3' name='odp" . $i . "' value='" . $questionTabRand[2] . "'>" . $questionTabRand[2] . "<br>";
	echo "D: <input type='radio' id='answear4' name='odp" . $i . "' value='" . $questionTabRand[3] . "'>" . $questionTabRand[3] . "<br><br>";
}
echo "<input type='submit' value='Sprawdź'>";
echo "</form></div></div></div></div>";

setcookie("answear", serialize($correctAnswearTab), time() + (86400 * 30), "/");

?>




















<?php
require 'footer.php';
?>