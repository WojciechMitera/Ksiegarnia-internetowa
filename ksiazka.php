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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- <body>
    <div>
    Dodaj ksiazke:
    <form method = "post" enctype="multipart/form-data" action = "script-ksiazka1.php">
    Tytul<br>    
    <input type = "text" name = "tytul" required><br>
    Autor<br>    
    <input type = "text" name = "autor" required><br>
    Wydawnictwo<br>    
    <input type = "text" name = "wyd" required><br>
    Rok_wydania<br>    
    <input type = "number" name = "rok" required><br>
    Ilosc<br>    
    <input type = "number" name = "ilosc" min = "0" max = "100" required><br>
    Cena<br>    
    <input type = "number" name = "cena" min = "0" required><br><br>
    <input type = "submit" value = "Dodaj">
    </form><br>
    Usun ksiazke
    <form method = "get" enctype="multipart/form-data" action = "script-ksiazka2.php">
        Podaj id<br>
        <input type = "number" name = "id" required><br>
        <input type = "submit" value = "Usun">
    </form>
    </div>
    <div id = "list">
        Lista ksiazek:<br><br>
        <?php
            $d = mysqli_connect("localhost", "root", "", "ks_int");
            $zap1 = "SELECT * FROM ksiazka";
            $w1 = mysqli_query($d, $zap1);
            $i = 1;
            while($arr = mysqli_fetch_array($w1)){
                echo $i.". Tytul i autor: ".$arr['tytul']." ".$arr['autor']."<br>"."Id: ".$arr['id_ksiazki']."<br>";
                $i++;
            }
        ?>
    </div>
    <a href = "strona.php">Wroć</a>
</body> -->
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
    <h1>Dodaj książke</h1>
    <form method = "post" enctype="multipart/form-data" action = "script-ksiazka1.php">
    <div class = "input"><input type = "text" name = "tytul" required autocomplete = "off" placeholder = "Tytuł"></div>
    <div class = "input"><input type = "text" name = "autor" required autocomplete = "off" placeholder = "Autor"> </div>
    <div class = "input"><input type = "text" name = "wyd" required autocomplete = "off" placeholder = "Wydawnictwo"></div>
    <div class = "input"><input type = "number" name = "rok" required autocomplete = "off" placeholder = "Rok_wydania"></div>
    <div class = "input"><input type = "number" name = "ilosc" required autocomplete = "off" placeholder = "Ilość"> </div>
    <div class = "input"><input type = "number" name = "cena" required autocomplete = "off" placeholder = "Cena"></div>
    <button type = "submit">Dodaj</button>
    </form><br>
    <h1>Usuń książke</h1>
    <form method = "get" enctype="multipart/form-data" action = "script-ksiazka2.php">
    <div class = "input"><input type = "number" name = "id" required autocomplete = "off" placeholder = "Id"></div>
    <button type = "submit">Usuń</button>
    
    </form>
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
        </div>
</body>
</html>
