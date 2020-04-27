<?php
require_once 'system/function.php';
session_start(); 
$err_post = "";
$err_title = "";
$err = "";
if(isset($_GET['post_id']) && is_numeric($_GET['post_id'])){
  $link = db_connect();
  mysqli_set_charset($link,"utf8");
  $post_id = trim(filter_input(INPUT_GET, 'post_id',FILTER_SANITIZE_STRING));
  $sql = "SELECT * FROM posts WHERE id = '$post_id' AND userid = '{$_SESSION['uid']}'";
  $result = mysqli_query($link,$sql);
    if($result && mysqli_num_rows($result)== 1 ){
      $data = mysqli_fetch_assoc($result);

    }
}






if( isset($_POST['submit'])){
  if(isset($_POST['token']) && $_SESSION['token'] == $_POST['token']){
   
   if(empty($_POST['title'])){
    $err_title = "you must fill title input!";
  }elseif (empty ($_POST['post'])) {
    $err_post = "you must fill text input!";
  }else{
    
   $title = trim(filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING)); 
   $post = trim(filter_input(INPUT_POST, 'post',FILTER_SANITIZE_STRING));
   $post_id = trim(filter_input(INPUT_GET, 'post_id',FILTER_SANITIZE_STRING));
   $uid = $_SESSION['uid']; 
   
   
   
   $title = mysqli_real_escape_string($link,$title); 
   $post = mysqli_real_escape_string($link,$post);
   $post_id = mysqli_real_escape_string($link,$post_id);
   
   
   
   $sql = "UPDATE `posts` SET `title`='$title',`post`='$post',`create_at`=NOW() WHERE id = '$post_id' AND userid = '{$_SESSION['uid']}'";
//echo $sql;die;
   $result = mysqli_query($link, $sql);
   if($result && mysqli_affected_rows($link)>0){
     $_SESSION['ms'] = "your post updated!!";
     header("location: my_page2.php");
   }
   
   
   
  }
  }  
}



$token = csrfToken();
$_SESSION['token'] = $token;
?>

<?php require_once 'header.php';?>



<div class="container  py-5 mb-4 mt-5">
  <div class="row card">
    
    <span style="color:red;"><?= $err ;?></span>
    <form class="forum-sugnin card-body" method="post" action="">

  <h1 class="h1 py-5 md-3 col">Edit post</h1>
  
  <span>Title:</span>
  <input name="title" class="form-control" type="text" value="<?= htmlentities($data['title']) ;?>" autofocus>
  <span style="color:red;"><?= $err_title ;?></span>
  
  
  <span>Post:</span>
  <!--<input name="post" type="text" id="inputEmail" class="form-control" value="<?= old('post') ;?>" autofocus>-->
  <textarea name="post" cols="30" rows="10"  class="col form-control text-left"><?= htmlentities($data['post']) ;?> </textarea>
  <span style="color:red;"><?= $err_post ;?></span>
  
    
  
  <div class="checkbox mb-3">
    <input type="hidden" name="token" value="<?= $token ;?>">  
  </div>
  <button name="submit" class="btn btn-secondary btn-block" type="submit">Save post</button>

</form>    
  </div>
</div>

<?php require_once 'footer.php';?>

