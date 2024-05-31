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
        #list{
            margin-top:10px;
        }
        .form{
            

            
        }
        .form .input {
            margin:20px 0;
        }
        .register{
            font-size:14.5px;
            text-align:center;
            margin:20px 0 15px;
        }
        p a{
            color:white;
            text-decoration:none;
            font-weight:600;
        }
        p a:hover{
            text-decoration:underline;
        }
        .titles{
            display:flex;
            flex-wrap:wrap;
        }
        .form{
            width:600px;
            background-color:transparent;
            color:white;
            border-radius: 10px;
            margin:60px 0;
            padding:30px 40px;
            border:2px solid rgba(255,255,255,.2);
            backdrop-filter:blur(5px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
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
    <div class = "w">
    <div class = "form">
    <h1>Zloz zamowienie</h1>
    <form action = "zamowienie.php" method = "post" enctype="multipart/form-data">
    <div class = "input"><input type = "text" name = "tyt" placeholder = "Tytuł" required autocomplete = "off"></div>
        <button type = "submit">Zatwierdz</button>
    </form>
    <?php
    $d = mysqli_connect("localhost", "root", "", "ks_int");
    if (isSet($_POST["tyt"])){
        $tytul = $_POST['tyt'];
        $zap2 = "SELECT * FROM ksiazka where tytul = '$tytul'";
        $w2 = mysqli_query($d, $zap2);
        while($arr2 = mysqli_fetch_array($w2)){
            //echo "Tytul: ".$arr2['tytul']." "."Autor: ".$arr2['autor']."<br>"."Ilosc: ".$arr2['ilosc']."<br><br>";
            echo "<form action = 'zamowienie-script.php' method = 'post' enctype='multipart/form-data'>
                <div class = 'input'><input type = 'number' placeholder = 'Ilość' required name = 'ilo' min = '0' max = '".$arr2['ilosc']."'></div>
                <input class = 'id' type = 'number' name = 'id'  value = '".$arr2['id_ksiazki']."'>
                <button type = 'submit'>Zamow</button>
            </form>";
        }
        
    }?>
    <div id = "list">
        <h1>Lista ksiazek</h1><br><br>
        <?php
            $d = mysqli_connect("localhost", "root", "", "ks_int");
            $zap1 = "SELECT * FROM ksiazka";
            $w1 = mysqli_query($d, $zap1);
            $i = 1;
            while($arr = mysqli_fetch_array($w1)){
                echo $i.". Tytul: ".$arr['tytul']." "."Id: ".$arr['id_ksiazki']."<br><br><hr><br>";
                $i++;
            }
        ?>
                </div>
    </div>
    </div>
    
    <div id = "foot">Wojciech Mitera 2TP 2024</div>
</body>
</html>