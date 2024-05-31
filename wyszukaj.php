<?php
    session_start();
    if (!isset($_SESSION['log'])) {
        header('location: loguj.php');
        exit();
    }
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "style4.css">
    <style>
        .book{
                height:320px;
                margin:220px 0;
            }
        
    </style>
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
        
       
        <div id = "books">
        <?php
                $title = $_POST['title'];
                //echo $title;
                $d = mysqli_connect("localhost", "root", "", "ks_int");
                $zap1 = "SELECT * from ksiazka where tytul like '%$title%'";
                $w1 = mysqli_query($d, $zap1);
                while($arr = mysqli_fetch_array($w1)){
                    echo "<div class = 'book'>"."<div class = 'book_title'>".$arr['tytul']."</div>"."Autor: ".$arr['autor']."<br>"."Cena: ".$arr['cena']." zl"."<br>"."Ilosc: ".$arr['ilosc']."<br>"."</div>";
                }
            ?>
        </div>
              
        <div id = "foot">Wojciech Mitera 2TP 2024</div>
            </div>
</body>
</html>
