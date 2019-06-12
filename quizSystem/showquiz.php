<?php
require 'header.php';
require 'includes/dbh.inc.php';




  echo " <div class='box'> 
            <div class='box-content'>
               <div class='inner-box'>
               <div class='quiz-name'>
                  <h1>QUIZY:</h1>
               <a class='go-home' href='home.php'>Home</a>
               </div>";

   
   
 //wyświtlenie nazw quizów które juz były
   $q = "SELECT table_name FROM information_schema.tables where table_schema='quizsystem';";
   $result = $conn->query($q);
   echo "<div class='scroll'>
            <table class='tab'>
               
            ";
   while($row = $result->fetch_assoc()) {
      if ($row['table_name'] != "users" && $row['table_name'] != "questioncount"){
         echo "<tr><td><a class='quiz-link' href='randomquestions.php?table=".$row['table_name']."'>".$row['table_name']."</a></td></tr>";
      }
   }
   
   echo "</table></div> 
   </div>
   </div>
</div>";










require 'footer.php';
?>