<?php
require 'dbh.inc.php';

if (isset($_REQUEST['quizNameBtn'])) {


    if(empty($_REQUEST['quizName'])){
        header("Location: ../createquiz.php?error=emptyfield");
        exit();
    }else {
        $quiztab = array();
        $q = "SELECT table_name FROM information_schema.tables where table_schema='quizsystem';";
        $result = $conn->query($q);
    
        while($row = $result->fetch_assoc()) {
            if ($row['table_name'] != "users"){
                array_push($quiztab, $row['table_name']);
            }
        }
        $quizTabIndex = count($quiztab);
        for ($i = 0; $i < $quizTabIndex; $i++){
            if($_REQUEST['quizName'] == $quiztab[$i]){
                header("Location: ../createquiz.php?error=exist");
                exit();
            }
        }
        $q = "CREATE TABLE `". $_REQUEST['quizName'] . "` (`id` INT(11) AUTO_INCREMENT PRIMARY KEY, 
                                                        `pytanie` TEXT NOT NULL, 
                                                        `prawidlowa` TEXT NOT NULL, 
                                                        `nieprawidlowa1` TEXT NOT NULL, 
                                                        `nieprawidlowa2` TEXT NOT NULL,
                                                        `nieprawidlowa3` TEXT NOT NULL
                                                        );";
        $conn->query($q);
        header("Location: ../createquestions.php?table=".$_REQUEST['quizName']);
        exit();

    }
}

?>