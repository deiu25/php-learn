<?php

if ( isset( $_POST['submit'] ) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $connection = mysqli_connect( 'localhost', 'root', '', 'loginapp' );

    if ( $connection ) {
        echo "We are connected";
    } else {
        die( "Database connection failed" );
    }
    
    $query = "INSERT INTO users(username, password, email)";
    $query .= "VALUES ('$username', '$password', '$email')";
    
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        die('Query Failed' . mysqli_error());
    }
}
//    } else {
//        echo "Wrong Username or Password";
//    }
//
//    if ( $username && $password ) {
//        echo $username;
//        echo $password;
//}

?>

<!DOCTYPE html>
<html lang = "en">

<head>
<meta charset = "UTF-8">
<title>Document</title>
<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin = "anonymous">
<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin = "anonymous"></script>
</head>

<body>
<div class = "container">
<div class = "col-sm-6">
<form action = "login_create.php" method = "post">
<div class = "form-group">
<label for = "username">Username</label>
<input type = "text" name = "username" class = "form-control">
</div>
<div class = "form-group">
<label for = "password">Password</label>
<input type = "password" name = "password" class = "form-control">
</div>
<div class = "form-group">
<label for = "email">Email</label>
<input type = "text" name = "email" class = "form-control">
</div>
<input class = "btn btn-primary" type = "submit" name = "submit" value = "Submit">
</form>
</div>
</div>

</body>

</html>
