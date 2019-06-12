<?php
	require 'header.php';
	require 'includes/getcounts.inc.php';
	echo '	<div class="box"> 
				<div class="box-content">
					<div class="result-box">';

	$correctAnswearsPoints = 0;
	$answearTab = null;
	if(isset($_COOKIE['answear'])){
		$answearTab = unserialize($_COOKIE['answear'], ["allowed_classes" => false]);	
	}
	
	$userAnswears = array();
	
	for($i = 0; $i < $countOfQ; $i++){
		$userAnswears[] = isset($_POST['odp' . $i]) ? $_POST['odp' . $i] : '0';	
	}
	
	for($i = 0; $i < $countOfQ; $i++){
		if($answearTab[$i] == $userAnswears[$i])
			$correctAnswearsPoints += 1;
	}
	
	$percent = $correctAnswearsPoints / $countOfQ * 100;
	
	echo "<h1>Wynik: " . $correctAnswearsPoints . "/".$countOfQ." || Procent: " . $percent . "%</h1>";
	
	echo "<a href='showquiz.php'>Wróć do listy testów</a>";
?>

