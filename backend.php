<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="fronted.php.php" method="post">
<h1 class="display-3 text-dark"> Hello <?= htmlspecialchars($_SESSION['name']); ?> </h1>
</body>
</html>

