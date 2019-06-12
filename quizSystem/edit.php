<?php
    require 'header.php';
    require 'includes/dbh.inc.php';
?>



<?php
if(!isset($_SESSION['userId']) || (isset($_SESSION['userId']) && $_SESSION['admin']!=1)){
    header("Location: index.php");
    exit();
}else if(isset($_GET['table'])){
    echo "  <div class='box'> 
                <div class='box-content'>
                    <div class='inner-box'>
                        <div class='editto'>
                            <form method='post' action='includes/edit.inc.php?table=".$_GET['table'] . "&id=".$_GET['id']."'>
                                <div class='lewy'>
                                <input name='etrescPytania' type='text' placeholder='Treść Pytania'>
                                <input name='eniepoprawna1' type='text' placeholder='Zmyłka 1'>
                                <input name='eniepoprawna3' type='text' placeholder='Zmyłka 3'>
                                </div>
                                <div class='prawy'>
                                <input name='epoprawna' type='text' placeholder='Poprawna odpowiedz'>
                                <input name='eniepoprawna2' type='text' placeholder='Zmyłka 2'>
                                <input name='edytuj' type='submit' value='Zakończ edycje pytania'>
                                </div>
                            </form>
                        </div>
                            ";    
    echo "  <a class='go-home' href='show.php?table=" . $_GET['table'] ."'>Wróć</a>"; 

    echo "  <table>
                <tr>
                    <th>Id</th>
                    <th>Pytanie</th>
                    <th>Prawidłowa</th>
                    <th>Nieprawidłowa1</th>
                    <th>Nieprawidłowa2</th>
                    <th>Nieprawidłowa2</th>
                </tr>
                ";
    $q = "SELECT * FROM " . $_GET['table'] ." WHERE id='".$_GET['id']."';";
    $result = $conn->query($q);
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row['id'] ."</td><td>". $row['pytanie'] ."</td><td>". $row['prawidlowa'] ."</td><td>". $row['nieprawidlowa1'] ."</td><td>". $row['nieprawidlowa2'] ."</td><td>". $row['nieprawidlowa3'] ."</td></tr>";    
    }
    echo "</table>
    </div></div></div>";
}else if(isset($_REQUEST['zakoncz'])){
    header("Location: createquiz.php");
    exit();
}


?>




































<?php
   require 'footer.php';
?>