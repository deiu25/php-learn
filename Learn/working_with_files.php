<?php

$file = "example.txt";

if($handle = fopen($file, 'w')) {
    //scriem in doc
    $text = 'First write in php to .txt';
    fwrite($handle, $text);
    fclose($handle);

    // Acum, citim conținutul fișierului
    $content = file_get_contents($file);
    echo "Conținutul fișierului: " . $content;

} else {
    echo "The application is not able to write on the file";
}

?>
