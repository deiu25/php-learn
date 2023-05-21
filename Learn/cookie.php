<?php

$name = "cookieName";
$value = 100;
$expiration = time() + (60*60*27*7);
setcookie($name. $value, $expiration);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php
    
    if(isset($_COOKIE["cookieName"])) {
        $someOne = $_COOKIE["cookieName"];
        echo $someOne;
    } else {
        $someOne = "";
    }
    
    ?>
    
    
</body>
</html>