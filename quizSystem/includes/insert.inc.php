<?php 

require 'dbh.inc.php';

if(isset($_REQUEST['dodaj-pytanie'])){
    $tresc = $_REQUEST['trescPytania'];
    $poprawna = $_REQUEST['poprawna'];
    $niepoprawna1 = $_REQUEST['niepoprawna1'];
    $niepoprawna2 = $_REQUEST['niepoprawna2'];
    $niepoprawna3 = $_REQUEST['niepoprawna3'];
    $table = $_GET['table'];

    $q = 'INSERT INTO ' . $table . ' VALUES (null,"'. $tresc .'","'. $poprawna .'","' . $niepoprawna1 .'","' . $niepoprawna2 .'","' . $niepoprawna3 . '");';
    if(!$conn->query($q)){
       echo $conn->error;
    }else {
        header("Location: ../show.php?table=". $table);
        exit();
    }
}

?>