<?php
    require 'header.php';
?>


<?php
        if(isset($_SESSION['userId']) && $_SESSION['admin']==1){
           echo '<div class="box"> 
                    <div class="box-content">
                        <div class="inner-box">
                            <h1>Witaj '. $_SESSION["username"] .'!</h1>';
           echo '               <div class="LogOut-form">
                                    <form action="includes/logout.inc.php">
                                        <input name="LogOutBtn" type="submit" value="Logout">
                                    </form>
                                    <a class="create-quiz" href="createquiz.php">Stwórz quiz</a>
                                </div>
                                <div class="changeQcount-form">
                                    <form action="includes/addqcount.inc.php">
                                        <input name="Qcount" type="text" placeholder="zmień ilość pytań w quizach">
                                    <input name="changeQcount" type="submit" value="znień"/>
                                </form>
                                </div>
                        </div>
                    </div>
                </div>';
        }else if(isset($_SESSION['userId'])){
            echo '<div class="box"> 
                    <div class="box-content">
                        <div class="inner-box">
                            <h1>Witaj '. $_SESSION["username"] .'!</h1>';
            echo '              <div class="LogOut-form">
                                    <form action="includes/logout.inc.php">
                                        <input name="LogOutBtn" type="submit" value="Logout">
                                    </form>
                                    <a class="create-quiz" href="showquiz.php">Pokaż Quizy</a>
                                </div>
                        </div>
                    </div>
                </div>';
        }
?>



<?php
    require 'footer.php';
?>