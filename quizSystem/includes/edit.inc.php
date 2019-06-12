<?php 

require 'dbh.inc.php';


if(isset($_REQUEST['edytuj'])){

    $eTresc = $_REQUEST['etrescPytania'];
    $ePoprawna = $_REQUEST['epoprawna'];
    $eNiepoprawna1 = $_REQUEST['eniepoprawna1'];
    $eNiepoprawna2 = $_REQUEST['eniepoprawna2'];
    $eNiepoprawna3 = $_REQUEST['eniepoprawna3'];

    $q = "UPDATE " . $_GET['table'] . " SET pytanie='". $eTresc ."',prawidlowa='".$ePoprawna."',nieprawidlowa1='". $eNiepoprawna1 ."', nieprawidlowa2='". $eNiepoprawna2 ."',nieprawidlowa3='". $eNiepoprawna3 ."' WHERE id=" .$_GET['id'] . ";";                           
    if(!$conn->query($q)){
        echo "error in query" . $conn->error;
    }else{
        header("Location: ../show.php?table=".$_GET['table']);
        exit();
    }

}







?>