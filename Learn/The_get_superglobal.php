<?php  

print_r($_GET);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
   <?php 
    $id = 10;
    $button = "Submit";
    ?>
    
   <a href="The_get_superglobal.php?id=<?php echo $id;?>"><?php echo $button ?></a>
   <a href="">hei</a>
    
</body>
</html>