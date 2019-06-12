<?php
require 'dbh.inc.php';



if (isset($_REQUEST['changeQcount'])){
    if(!intval($_REQUEST['Qcount'])){
        $qcount = 10;
        $q = "UPDATE questioncount SET realCount=".$qcount ." WHERE idCount=1;";
        $conn->query($q);
        header("Location: ../home.php");
        exit();
    } else {
        $qcount = $_REQUEST['Qcount'];
        $q = "UPDATE questioncount SET realCount=".$qcount ." WHERE idCount=1;";
        $conn->query($q);
        header("Location: ../home.php");
        exit();
    }
    
    
    
}






?>