<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php

//      Funcții pentru lucrul cu string-uri:
    
    $string = "Salut, lume!";

    echo strlen($string); echo "<br>"; // Afișează lungimea șirului, rezultatul va fi "12"

    echo str_replace("lume", "Ion", $string); // Înlocuiește cuvântul "lume" cu "Ion", rezultatul va fi "Salut, Ion!"

    echo "<br>";
    
//      Funcții pentru lucrul cu numere:   
    echo rand(1, 10); echo "<br>"; // Generează un număr aleatoriu între 1 și 10 

    echo max(1, 3, 5, 9, 7); echo "<br>"; // Afișează cel mai mare număr din lista dată, rezultatul va fi "9"
    
//      Funcții pentru lucrul cu array-uri:   
    
   $array = array("element1", "element2", "element3");

    echo count($array); echo "<br>"; // Numără elementele din array, rezultatul va fi "3"

    sort($array);  echo "<br>"; // Sortează elementele array-ului în ordine alfabetică
 
//      Funcții pentru lucrul cu fișiere:    
    $file = fopen("embed.php", "r"); // Deschide fișierul "test.txt" pentru citire

    $content = fread($file, filesize("embed.php")); // Citește conținutul fișierului "test.txt"

    fclose($file); // Închide fișierul "test.txt"
    
    
?>
</body>

</html>
