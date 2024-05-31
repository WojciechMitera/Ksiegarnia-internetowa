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
    <link rel = "stylesheet" href = "style4.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .form{
            width:400px;
            background-color:transparent;
            color:white;
            border-radius: 10px;
            margin:60px 0;
            padding:30px 40px;
            border:2px solid rgba(255,255,255,.2);
            backdrop-filter:blur(3px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            text-align:center;
        }
        .register{
            font-size:14.5px;
            text-align:center;
            margin:20px 0 15px;
        }
        a{
            color:white;
            text-decoration:none;
            font-weight:600;
        }
        a:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>
<div class = "b">
        <div id = "menu"><h1>Ksiegarnia internetowa</h1>
            <nav>
                <ul>
                    <li><a class = "button" href="strona.php">Strona główna</a></li>
                    <li><a class = "button" href = "klient.php">Zarzadzaj klientami</a></li>
                    <li><a class = "button" href = "ksiazka.php">Zarzadzaj ksiazkami</a></li>
                    <li><a class = "button" href="wyloguj.php">Wyloguj</a></li>
                </ul>
            </nav>
        </div>
        <div class = "w">
        <div class = "form">
            <?php
                $d = mysqli_connect("localhost", "root", "", "ks_int");
                $tytul = $_POST['tytul'];
                $autor = $_POST['autor'];
                $wyd = $_POST['wyd'];
                $rok = $_POST['rok'];
                $il = $_POST['ilosc'];
                $cena = $_POST['cena'];
                $zap = "INSERT INTO ksiazka values(NULL, '$tytul', '$autor', '$wyd', '$rok', '$il', '$cena')";
                $w = mysqli_query($d, $zap);
                echo "Dodano książke<br><br>";
            ?>
        <a class = "register" href = "ksiazka.php">Wroć</a>
</div>
    </div>       
    <div id = "foot">Wojciech Mitera 2TP 2024</div>
        </div>
</body>
</html>