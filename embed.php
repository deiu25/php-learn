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
    $title = "Variables:";
    $name = 'Deiu';
    $varsta = 30;
    echo $name . " " . $varsta;
    
//    Constante:
//    Constantele sunt valori care nu se pot modifica pe parcursul executării scriptului.
//    Pentru a defini o constantă, se utilizează funcția define() sau cuvântul cheie const într-o clasă.
    define("PI", 3.141592);
    //sau intr-o clasa
    class Cerc {
        const PI = 3.141592;
    }
    echo PI;
    ?>

    <h1><?php echo $title; ?></h1>
</body>

</html>