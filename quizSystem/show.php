<?php
    require 'header.php';
    require 'includes/dbh.inc.php';
?>


<?php
        if(!isset($_SESSION['userId']) || (isset($_SESSION['userId']) && $_SESSION['admin']!=1)){
            header("Location: index.php");
            exit();
        }else if(isset($_GET['table'])){
            echo '  <div class="box"> 
                        <div class="box-content">
                            <div class="inner-box">
                            ';    
            echo '  <div class="add-question">
                        <form method="post" action="insert.php?table='.$_GET['table'].'">
                            <input name="dodawanie" type="submit" value="Dodaj Pytanie">
                        </form> 
                        <a class="go-home" href="createquiz.php">Wróć</a> 
                    </div>';
            echo " <div class='scroll'> <table>
                        <tr>
                            <th>Id</th>
                            <th>Pytanie</th>
                            <th>Prawidłowa</th>
                            <th>Nieprawidłowa1</th>
                            <th>Nieprawidłowa2</th>
                            <th>Nieprawidłowa3</th>
                        </tr>
                        ";
            $q = "SELECT * FROM " . $_GET['table'] .";";
            $result = $conn->query($q);
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>". $row['id'] ."</td><td>". $row['pytanie'] ."</td><td>". $row['prawidlowa'] ."</td><td>". $row['nieprawidlowa1'] ."</td><td>". $row['nieprawidlowa2'] ."</td><td>". $row['nieprawidlowa3'] ."</td><td><a href='edit.php?table=" . $_GET['table'] . "&id=" . $row['id'] . "'>Edytuj<a/></td><td><a href='includes/delete.inc.php?table=" . $_GET['table'] . "&id=" . $row['id'] . "'>Usuń</td></tr>";    
            }
            echo "</table>
            </div>
            </div>
            </div>
            </div>";
        }
?>
   







<?php
   require 'footer.php';
?>