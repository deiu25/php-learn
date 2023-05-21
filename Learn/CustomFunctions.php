<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

    <?php 

    echo "Functions <br>";

//      Funcțiile personalizate sunt blocuri de cod care pot fi definite de către utilizator și pot fi apelate ori de câte ori este nevoie.
//      Acestea sunt foarte utile pentru a evita repetarea codului și pentru a face codul mai organizat și mai ușor de înțeles.
    
//    Definirea unei funcții: O funcție este definită folosind cuvântul cheie function, urmat de numele funcției și parantezele (). 
//    Apelarea unei funcții: O funcție este apelată prin scrierea numelui său urmat de paranteze.
    function salut() {
    echo "Salut, lume!";
}
    salut();
    
    echo "<br>";
    
//    Funcții cu parametri: Funcțiile pot primi și parametri, care sunt specificați între parantezele () la definirea funcției.    
    function salutNume($nume) {
        echo "Salut, $nume!";
    }
    salutNume("Ion");  // Afișează "Salut, Ion!"
    
    echo "<br>";
    
//    Funcții cu valori de retur: Funcțiile pot returna valori folosind cuvântul cheie return.    
    function aduna($x, $y) {
    return $x + $y;
    }
    echo aduna(3, 4);  // Afișează "7"
    
    echo "<br>";
    
//      Global variables and Scope
    $x = 'outside'; //global
    
    function convert() {
        global $x;
        $x = 'inside'; //local
    }
    echo $x;
    echo "<br>";
    convert();
    echo $x;
    
    
    
    
?>

</body>

</html>
