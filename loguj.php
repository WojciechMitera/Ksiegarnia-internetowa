<!DOCTYPE html>
<html>
    <head>
        <title>Autoryzacja danych</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel = "stylesheet" href = "style.css">
        <style>
            
            
        </style>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <div class = "b">
        <div class = "form">
            <form action="loguj.php" method="post" enctype="multipart/form-data">
                <h1>Logowanie</h1>
                
                <div class = "input"><input type="text" name="nazwa" value="" size="25" required placeholder = "Login" autocomplete = "off"><i class='bx bxs-user'></i></div>
                
                <div class = "input"><input type="password" name="haslo" value="" size="25" required placeholder = "Hasło" autocomplete = "off"><i class='bx bxs-lock-alt'></i></div>
                <button type="submit" >Zaloguj się</button>
                <div class = "register"><p>Nie masz konta? <a href = 'rejestruj.php'>Zarejestruj się</a></p></div>
                <div class = "register">
                <?php
    
    session_start();
    
    $d = mysqli_connect("localhost", "root", "", "ks_int");
    
    if(isSet($_SESSION["log"])) {
        header("location: strona.php");
        exit();
    } elseif(isSet($_POST["nazwa"]) && isSet($_POST["haslo"])) {
        $name = $_POST['nazwa'];
        $haslo = $_POST['haslo'];
        $zap1 = "SELECT * FROM klient where log_in = '$name' and haslo = '$haslo'";
        $w1 = mysqli_query($d, $zap1);
        while($arr = mysqli_fetch_array($w1)){
            if($_POST["nazwa"] == $arr['log_in'] && $_POST["haslo"] == $arr['haslo']) {
                $_SESSION["log"] = $name;
                header("location: strona-klient.php");
                
                exit();}
                
            }if($name == "admin" && $haslo == "zsme"){
                $_SESSION["log"] = $name;
                header("location: strona.php");
                
                exit();
            
            }
            else{
                ///echo "Nieprawidłowe dane logowania";
                
            }
        
        
    }
    //echo "<br>";
        
    

?>
                </div>
            </form>
            </div>
        </div>
        
    </body>
</html>

