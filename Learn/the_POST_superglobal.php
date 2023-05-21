<?php

echo $_POST['name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="the_POST_superglobal.php" method="post">
        <input type="text" name="name">
        <input type="submit">
    </form>    
</body>
</html>