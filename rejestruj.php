
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    
 <div class = "b">
    <div class = "form">
    <h1>Zarejestruj się</h1>
    <form method = "post" enctype="multipart/form-data" action = "rejestruj.php">
   
    <div class = "input"><input type = "text" name = "imie" required autocomplete = "off" placeholder = "Imię"><br></div>

    <div class = "input"><input type = "text" name = "naz" required autocomplete = "off" placeholder = "Nazwisko"><br></div>
  
    <div class = "input"><input type = "date" name = "data" required autocomplete = "off" placeholder = "Data urodzenia"><br></div>
  
    <div class = "input"><input type = "text" name = "email" required autocomplete = "off" placeholder = "Email"><br></div>
   
    <div class = "input"><input type = "text" name = "tel" required autocomplete = "off" placeholder = "Telefon"><br></div>
    
    <div class = "input"><input type = "text" name = "login" required autocomplete = "off" placeholder = "Login"><br></div>
    
    <div class = "input"><input type = "text" name = "haslo" required autocomplete = "off" placeholder = "Hasło"><br><br></div>
    <button type = "submit">Dodaj</button>
    <div class = "register"><p><a href="loguj.php">Wroć</a></p></div>
    <div class = 'register'>
    <?php
    
    $d = mysqli_connect("localhost", "root", "", "ks_int");
    
    
    
    if(isSet($_POST["imie"]) && isSet($_POST["naz"]) && isSet($_POST["data"]) && isSet($_POST["email"]) && isSet($_POST["tel"]) && isSet($_POST["login"]) && isSet($_POST["haslo"])){
        $imie = $_POST['imie'];
        $naz = $_POST['naz'];
        $data = $_POST['data'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $zap1 = "SELECT log_in from klient where log_in = '$login'";
        $w1 = mysqli_query($d, $zap1);
        $arr = mysqli_fetch_array($w1);
    if (isset($arr['log_in'])){
    if ($login == $arr['log_in']){
        echo "Login jest już zajety";
    }
    
    }
    else{
        $zap = "INSERT INTO klient values(NULL, '$imie', '$naz', '$data', '$email', '$tel', '$login', '$haslo')";
        $w = mysqli_query($d, $zap);
        echo "Zarejestrowano pomyślnie";
        }
}
    
?>
    </div>
</form><br>
    
</div>
</div>
</body>
</html>
