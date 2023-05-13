<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

//    Variabile:
//    În PHP, variabilele încep cu un simbol $ urmat de numele variabilei.
//    Numele unei variabile trebuie să înceapă cu o literă sau cu un underscore (_).
    echo "Variables: ";
    $name = 'Deiu';
    $varsta = 30;
    echo $name . " " . $varsta;
    
    echo "<br><br>";
//    Constante:
//    Constantele sunt valori care nu se pot modifica pe parcursul executării scriptului.
//    Pentru a defini o constantă, se utilizează funcția define() sau cuvântul cheie const într-o clasă.
    echo "Constante: ";
    define("PI", 3.141592);
    //sau intr-o clasa
    class Cerc {
        const PI = 3.141592;
    }
    echo PI;
    
    echo "<br><br>";
    
    echo "Array: ";
    echo "<br><br>";
//    Crearea unui Array: Există două tipuri de array-uri în PHP, indexate numeric și asociative.
//    Accesarea elementelor unui Array: Poți accesa un element al unui array folosind indicele sau cheia acestuia.
//     Array indexat numeric:
    $array = array("ion", "vasile", "gheorghe");
       echo $array[1];
    echo "<br><br>";

    $array = array("cheie1" => "element1", "cheie2" => "element2", "cheie3" => "element3");
//      Pentru array asociativ:
    echo $array["cheie1"];
    echo "<br><br>";
    
//    Modificarea elementelor unui Array: Poți modifica valoarea unui element al unui array în mod similar cu accesarea acestuia.
    $array[1] = "element nou";
    echo $array[1];
    echo "<br><br>";
    $array["cheie1"] = "element nou";
    echo $array["cheie1"];
    echo "<br><br>";
    
//    Numărarea elementelor unui Array: Poți folosi funcția count() pentru a obține numărul de elemente dintr-un array.
    echo count($array);     // Afișează numărul de elemente din array
    echo "<br><br>";

//    Parcurgerea unui Array: Poți parcurge un array folosind diverse structuri de control, cum ar fi for, foreach.
    foreach ($array as $cheie => $element) {
        echo "Cheia: $cheie ; Elementul: $element <br>";
    }
    echo "<br><br>";
    
    
//    Sortarea unui Array: PHP oferă mai multe funcții pentru sortarea array-urilor, cum ar fi sort(), asort(), ksort(), etc.
    sort($array);   // Sortează array-ul în ordine crescătoare
    
    
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
    //CONTROL STRUCTURES
    
//      Instrucțiunea If: Aceasta este cea mai simplă formă de control. Ea execută un bloc de cod dacă o anumită condiție este îndeplinită.   
    $a = 10;
    if($a > 5) {
        echo "Variabila este mai mare decat 5" . "<br><br>";
    }
    
//      Instrucțiunea If-Else: Adaugă o alternativă la instrucțiunea if. Dacă condiția if este falsă, codul din blocul else este executat.    
    $b = 2;
    if($b > 5){
        echo "Variabila este mai mare decat 5";
    } else {
        echo "Variabila este mai mica decat 5";
    }
   echo "<br>";
    echo "<br>";
//       Instrucțiunea Switch: Este o altă formă de control care permite verificarea unei variabile împotriva unei serii de valori.    
    $a = 3;
    switch ($a) {
        case 1:
            echo "Variabila este 1";
            break;
        case 2:
            echo "Variabila este 2";
            break;
        case 3:
            echo "Variabila este 3";
            break;
        default:
            echo "Variabila nu se gaseste";
    }
    
    echo "<br>";
    echo "<br>";
    
//       Buclele While și Do-While: Alte forme de bucle care permit executarea repetată a unui bloc de cod bazată pe o anumită condiție.
    $i = 0;
    while($i < 5) {
        echo $i;
        $i++;
    }
    
    echo "<br>";
    echo "<br>";
    
    $i = 0;
    do {
        echo $i;
        $i++;
    } while ($i < 5);
    echo "<br>";
    echo "<br>";
    
//       Buclele For și Foreach: Acestea permit executarea repetată a unui bloc de cod.   
   for ($i = 0; $i < 5; $i++) {
    echo $i;
}
    
    echo "<br>";
    echo "<br>";

$array = array(1, 2, 3, 4, 5);
foreach ($array as $value) {
    echo $value;
}
 

    
    ?>

    
</body>

</html>