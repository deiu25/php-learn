<?php

if ( isset( $_POST['submit'] ) ) {

    $names = array( "Ion", "Vasile", "Gheorghe", "Gigi", "Andrei", "Dan", "Adi" );

    $min = 3;
    $max = 10;

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ( strlen( $username ) < $min ) {
        echo "Username has to be longer that 3";
    }

    if ( strlen( $username ) > $max ) {
        echo "Username cannot be longer than 10";
    }

    if ( !in_array( $username, $names ) ) {
        echo "Invalid Username";
    } else {
        echo "Welcome";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form action="FormData.php" method="post">
        <input type='text' name="username" placeholder="Enter Username">
        <input type='password' name="password" placeholder="Enter Password"><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>
