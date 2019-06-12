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
                                <div class="editto">    
                                    <form method="post" action="includes/insert.inc.php?table='.$_GET['table'].'">
                                        <div class="lewy">
                                            <input name="trescPytania" type="text" placeholder="Treść Pytania">
                                            <input name="poprawna" type="text" placeholder="Poprawna odpowiedz">
                                            <input name="niepoprawna1" type="text" placeholder="Zmyłka 1">
                                        </div><div class="prawy">
                                            <input name="niepoprawna2" type="text" placeholder="Zmyłka 2">
                                            <input name="niepoprawna3" type="text" placeholder="Zmyłka 3">
                                            <input name="dodaj-pytanie" type="submit" value="dodaj pytanie">
                                        </div>
                                    </form>
                                </div> 
                                <a class="go-home" href="show.php?table=' . $_GET['table'] .'">Wróć</a>       
                            </div>        
                        </div>
                    </div>                                       
                ';


        }





?>



<?php
   require 'footer.php';
?>