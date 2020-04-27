<?php


if(isset($_POST['submit'])){
    header("locaition: backend.php");
    echo $_POST['name'];
    $_SESSION['name'] = $_POST['name']; 

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <form action="backend.php" method="post">
    <label for="name" style="font-family:italic;">Name:</label><br>
      <input type="text" name="name"  placeholder="Your Name"><br>
      <input  type="submit" name="submit">

</head>
<body>
    
</body>
</html>