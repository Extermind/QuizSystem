<div class="forms-all">
        <div class="signUp-form">
            <h1>zarejestruj się!</h1>
        
            <form action="includes/signup.inc.php" method="post">
                <input name="username" type="text" placeholder="Wpisz nazwę użytkownika" value="<?php echo (!isset($_GET['usernameS'])) ? null : $_GET['usernameS'];?>"/>
                <input name="class" type="text" placeholder='Wpisz klasę' value="<?php echo (!isset($_GET['class'])) ? null : $_GET['class'];?>"/>
                <input name="password" type="password" placeholder='Wpisz hasło'/>
                <input name="password-repeat" type="password" placeholder='Wpisz ponownie hasło'/>
                <input name="signUpBtn" type="submit" value="Zarejestruj sie"/>
            </form>  
    <?php
        if(isset($_GET['errorS'])){
            if($_GET['errorS']=="emptyfields"){
                echo "<p style='color: red;'>Wypełnij wszystkie pola!</p>";
            }
            else if($_GET['errorS'] == "passwordcheck"){
                echo "<p style='color: red;'>Hasła się nie zgadzają!</p>";
            }
            else if($_GET['errorS'] == "usertaken"){
                echo "<p style='color: red;'>Użytkownik jest już zapisany!</p>";
            }
        }
        else if(isset($_GET['signup']) && $_GET['signup'] == "success"){
            echo "<p style='color: limegreen;'>Pomyślnie Zarejestrowano</p>";
        }
    ?>     
        </div>
        <div class="logIn-form">

                <h1>Zaloguj się!</h1>
            <form action="includes/login.inc.php">
                <input name="username" type="text" placeholder='nazwa użytkownika' value="<?php echo (!isset($_GET['usernameL'])) ? null : $_GET['usernameL']; ?>"/>
                <input name="password" type="password" placeholder='hasło'/>
                <input name="LogInBtn" type="submit" value="Zaloguj sie"/>
            </form>
    <?php
        if(isset($_GET['errorL'])){
            if($_GET['errorL']=="emptyfields"){
                echo "<p style='color: red;'>Wypełnij wszystkie pola!</p>";
            }
            else if($_GET['errorL']=="wrongpwd"){
                echo "<p style='color: red;'>Złe hasło</p>";
            }
            else if($_GET['errorL']=="nouser"){
                echo "<p style='color: red;'>Taki użytkownik nie istnieje</p>";
            }
        }else if (isset($_GET['logout'])){
            if($_GET['logout']=="success"){
                echo "<p style='color: limegreen;'>Pomyślnie Wylogowano</p>";
            }
        }
    ?>
        </div>
</div>