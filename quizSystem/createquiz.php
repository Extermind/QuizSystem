<?php
    require 'header.php';
    require 'includes/dbh.inc.php';
?>


<?php
        if(!isset($_SESSION['userId']) || (isset($_SESSION['userId']) && $_SESSION['admin']!=1)){
            header("Location: index.php");
            exit();
        }else {
            echo '  <div class="box"> 
                        <div class="box-content">
                            <div class="inner-box">
                                <div class="quiz-name">
                                <form action="includes/createnamequiz.inc.php" method="post">
                                    <input name="quizName" type="text" placeholder="Nazwa Quizu"/>
                                    <input name="quizNameBtn" type="submit" value="Stwórz Pytania"/>
                                </form>
                                    <a class="go-home" href="home.php">Strona domowa</a>
                                </div>
                            ';
        }
?>
   


<?php

    if(isset($_GET['error'])){
        if($_GET['error']=="emptyfield"){
          echo "<p style='color: red;'>Wypełnij wszystkie pola!</p>";
        } 
        if($_GET['error']=="exist"){
            echo "<p style='color: red; padding: 0;'>Nazwa quizu juz istnieje!</p>";  
        }
    }
    if(isset($_GET['success'])){
        echo "<p style='color: green;'>Quiz został stworzony</p>";
    }
    
    //wyświtlenie naz quizów które juz były
    $q = "SELECT table_name FROM information_schema.tables where table_schema='quizsystem';";
    $result = $conn->query($q);
    echo "<div class='scroll'><table>";
    while($row = $result->fetch_assoc()) {
        if ($row['table_name'] != "users" && $row['table_name'] != "questioncount"){
            echo "<tr><td>" .$row['table_name'] . "</td><td><a href='show.php?table=".$row['table_name']."'>Pokaż</a></td></tr>";
        }
    }
    echo "</table></div> 
    </div>
    </div>
</div>";
?>
<?php
    require 'footer.php';
?>