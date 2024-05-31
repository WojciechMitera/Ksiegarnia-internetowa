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
            .book{
                height:280px;
            }
            #books{
                
                margin:0 0 240px 0;
            }
        </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Strona główna</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>
    <div class = "b">
    <div id = "menu"><h1>Ksiegarnia internetowa</h1>
        <nav>
            <ul>
                <li><a class = "button" href="strona-klient.php">Strona główna</a></li>
                <li><a class = "button" href="zamowienie.php">Zloz zamowienie</a></li>
                <li><a class = "button" href="wyloguj.php">Wyloguj</a></li>
            </ul>
        </nav>
    </div>
        
        <div id = "search"><form class = "form" method = "post" enctype="multipart/form-data" action = "wyszukaj.php"><input type = "text" required name = "title" placeholder = "Wyszukaj" autocomplete = "off"><i class='bx bx-search'></i></form></div>
        
        <div id = "books">
            <?php
                $d = mysqli_connect("localhost", "root", "", "ks_int");
                $zap1 = "SELECT * FROM ksiazka";
                $w1 = mysqli_query($d, $zap1);
                while($arr = mysqli_fetch_array($w1)){
                    echo "<div class = 'book'>"."<div class = 'book_title'>".$arr['tytul']."</div><hr><div class = 'info'>"."<p><h2>Autor:</h2> ".$arr['autor']."</p>"."<p><h2>Cena:</h2> ".$arr['cena']." zł"."</p>"."<p><h2>Ilosc:</h2> ".$arr['ilosc']."</p>"."</div></div>";
                }
            ?>
        </div>
            
        <div id = "foot">Wojciech Mitera 2TP 2024</div>
            </div>
    </body>
</html>

