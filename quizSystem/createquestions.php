<?php
    require 'header.php';
    require 'includes/dbh.inc.php';
?>
<div class="box"> 
    <div class="box-content">
        <div class="inner-box">
            <div class='editto'>
                <form action="includes/createquestions.inc.php?table=<?php echo $_GET['table']; ?>" method="post">
                    <div class="lewy">
                    <input class="textto" name="trescPytania" type="text" placeholder="Treść Pytania"/>
                    <input name="poprawna" type="text" placeholder="Poprawna odpowiedz"/>
                    <input name="niepoprawna1" type="text" placeholder="Zmyłka 1"/>
                    </div>
                    <div class="prawy">
                    <input name="niepoprawna2" type="text" placeholder="Zmyłka 2"/>
                    <input name="niepoprawna3" type="text" placeholder="Zmyłka 3"/>
                    <input name="dodaj-pytanie" type="submit" value="dodaj pytanie"/>
                    </div>
                </form>
            </div>
            <a class='go-home' href='createquiz.php?success=success'>Zakończ dodawanie</a> 






<?php
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
$q = "SELECT * FROM " . $_GET['table'] ." ;";
$result = $conn->query($q);
while($row = $result->fetch_assoc()) {
    echo "<tr><td>". $row['id'] ."</td><td>". $row['pytanie'] ."</td><td>". $row['prawidlowa'] ."</td><td>". $row['nieprawidlowa1'] ."</td><td>". $row['nieprawidlowa2'] ."</td><td>". $row['nieprawidlowa3'] ."</td></tr>"; 
}
echo "</table></div></div></div>";
?>

<?php
    require 'footer.php';
?>