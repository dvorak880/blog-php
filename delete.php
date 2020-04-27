<?php
require_once 'system/function.php';
session_start();
if(isset($_POST['submit'])){
  if(isset($_GET['post_id']) && is_numeric($_GET['post_id'])){
    $link = db_connect();
    $sql = "DELETE FROM `posts` WHERE id = {$_GET['post_id']} AND userid = {$_SESSION['uid']} ";
    $result = mysqli_query($link, $sql);
      if($result && mysqli_affected_rows($link)>0){
        $_SESSION['ms'] = "your post has been deleted!!";
        unset($_SESSION['errms']);

        header("location: my_page2.php");
      }

  }
}

?>
<?php require_once 'header.php';?>

<div class="container p-5 align-items-center">
  <div class="row-card">
    

    <div class="col">
  <h1 class="h3 mb-3 font-weight-normal">Are you sure you want to delete this post?</h1>
  </div>

  <form class="card-body col-12" method="post" action="">
  
  <div class="row justify-content-between">
 <div class="col-6">

  
  <button name="submit" class="btn btn-secondary btn-block" type="submit">Delete</button>

  </div>
</form>    
  </div>
</div>
<input type="hidden" name="token" value="<?= $token; ?>">
<?php require_once 'footer.php';?>

 
