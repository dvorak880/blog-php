<?php
require_once 'system/function.php';
vUser();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>My Food Blog</title>



    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="js/js.js"></script>






    <style>
    
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body {
        padding-top: 5rem;
      }
    </style>
   
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
  <a class="navbar-brand" style="margin-left:180px;font-size:22pt;font-family:italic;border:1px black;" href="index.php">-MY Food blog-</a>
   
  <?php if(empty($_SESSION['uid'])) :?> 
<a class="btn btn-secondary" style="margin-left:900px;" href="signIN.php">Signin</a>

<a class="btn btn-secondary" href="logIN.php">Signup</a>
<?php else:?>
<a class="btn btn-secondary" style="margin-left:900px;" href="signOUT.php">Sign Out</a>
<?php endif ;?>


</nav>

<?php if(isset($_SESSION['ms'])) :?>    
<div class="alert alert-success text-center ms" role="alert">
  <?= $_SESSION['ms'] ;?>
</div>
<?php endif ;?>
<!-- <?php if(isset($errms)) :?>    
<div class="alert alert-danger text-center ms" role="alert">
  <?= $errms ;?>
</div>
<?php endif ;?> -->
