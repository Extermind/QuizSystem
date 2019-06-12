<?php
if (isset($_REQUEST['LogInBtn'])){

    require "dbh.inc.php";

    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    if(empty($username) || empty($password)){
        header("Location: ../index.php?errorL=emptyfields&usernameL=".$username);
        exit();
    }
    else {
        $sql = "SELECT * FROM `users` WHERE username=?;";                       
        $stmt = $conn->init();
        if(!$stmt = $conn->prepare($sql)){
            header("Location: ../index.php?error=sqlerror3");    
            exit();   
        }
        else {
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $result = $stmt->get_result();          
            if($row = $result->fetch_assoc() ){     
                $pwdCheck = password_verify($password, $row['pwd']);
                if($pwdCheck == false){
                    header("Location: ../index.php?errorL=wrongpwd&usernameL=".$username);
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUser'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin'] = $row['admin'];
                    header("Location: ../home.php?login=success");
                    exit();
                }
            }
            else{
                header("Location: ../index.php?errorL=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../index.php");
    exit();
}
