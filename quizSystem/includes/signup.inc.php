<?php
if(isset($_REQUEST['signUpBtn'])){

    require 'dbh.inc.php';

    $username = $_REQUEST['username'];
    $class = $_REQUEST['class'];
    $password = $_REQUEST['password'];
    $passwordRepeat = $_REQUEST['password-repeat'];


    //basic error handler

    if(empty($username) || empty($class) || empty($password) || empty($passwordRepeat)){
        header("Location: ../index.php?errorS=emptyfields&usernameS=".$username."&class=".$class);
        exit();
    }
    else if($password != $passwordRepeat) {
        header("Location: ../index.php?errorS=passwordcheck&usernameS=".$username."&class=".$class);
        exit();
    }
    else{
        $sql = "SELECT username FROM users WHERE username=?;";        
        
        if(!$stmt = $conn->prepare($sql)){
            header("Location: ../index.php?errorS=sqlerror1");
            exit(); 
        } 
        else {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();
            $resultCheck = $stmt->num_rows();
            if($resultCheck > 0) {
                header("Location: ../index.php?errorS=usertaken&class=".$class);
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, class, pwd) VALUES (?, ?, ?);";
                
                if(!$stmt = $conn->prepare($sql)){
                    header("Location: ../index.php?errorS=sqlerror2");
                    exit(); 
                } 
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    $stmt->bind_param("sss", $username, $class, $hashedPwd);
                    $stmt->execute();
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }
    $stmt->close();
    $conn->close();    
}
else {
    header("Location: ../index.php");
    exit();
}
