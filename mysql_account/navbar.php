<?php
session_start();
include "db.php"; 
include "functions.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auth in PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Login-Register</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="login_update.php">Update</a></li>
          <li><a href="login_delete.php">Delete</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
    if(isset($_SESSION['username'])) {
        echo "<li><a href=\"account\account.php\"><span class=\"glyphicon glyphicon-user\"></span> " . $_SESSION['username'] . "</a></li>";
        echo "<li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Logout</a></li>";
    } else {
        echo "<li><a href=\"login_create.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>";
        echo "<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
    }
    ?>
</ul>

  </div>
</nav>
  
<div class="container">
  <div class="container">
    <div class="col-sm-6">

    </div>
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
