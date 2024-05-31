<?php
session_start();
if (!isset($_SESSION['log'])) {
    header('location: loguj.php');

    exit();
    
}
?>
<!DOCTYPE HTML>
<html>
    <head>
    <link rel = "stylesheet" href = "style4.css">
        <style>
            #books{
                
                margin:0 0 240px 0;
            }
        </style>
    <title>Strona główna</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>
        <div class = "b">
        <div id = "menu"><h1>Ksiegarnia internetowa</h1>
            <nav>
                <ul>
                    <li><a class = "button" href = "strona.php">Strona główna</a></li>
                    <li><a class = "button" href = "klient.php">Zarzadzaj klientami</a></li>
                    <li><a class = "button" href = "ksiazka.php">Zarzadzaj ksiazkami</a></li>
                    <li><a class = "button" href="wyloguj.php">Wyloguj</a></li>
                </ul>
            </nav>
        </div>
        
        <div id = "books">
            <?php
            
                $d = mysqli_connect("localhost", "root", "", "ks_int");
                $zap1 = "SELECT * FROM ksiazka";
                $w1 = mysqli_query($d, $zap1);
                while($arr = mysqli_fetch_array($w1)){
                    echo "<div class = 'book'>"."<div class = 'book_title'>".$arr['tytul']."</div><hr><div class = 'info'><p>"."Autor: ".$arr['autor']."</p><p>"."Cena: ".$arr['cena']." zł"."</p><p>"."Ilosc: ".$arr['ilosc']."</p>"."<form class = 'form' method = 'post' action = 'incr.php' enctype = 'multipart/form-data'>
                        <p>Zwieksz ilosc: (Max 100)</p>
                        <input class = 'input' type = 'number' required name = 'ilo' min = '0' max = '".(100 - $arr['ilosc'])."'>
                        <input class = 'id' type = 'number' name = 'id' value = '".$arr['id_ksiazki']."'>
                        <button class = 'button' type = 'submit'>Zwieksz</button>
                    </form>"."</div></div>";
                }
                //echo $_SESSION['log'];
            ?>
        </div>
            
        <div id = "foot">Wojciech Mitera 2TP 2024</div>
            </div>
    </body>
</html>
