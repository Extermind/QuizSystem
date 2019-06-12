<?php

$servername = "localhost";
$dBUsername = "root";
$dBPass = "";
$dBName = "quizsystem";

$conn = new mysqli($servername,$dBUsername,$dBPass,$dBName);

if($conn->connect_error){
    die('Could not conect: ' . $conn->connect_error);
}

