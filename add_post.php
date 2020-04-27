<?php
require_once 'system/function.php';
session_start();
$err_post="";
$err_title="";
$error="";

if(isset($_POST['submit'])){
    if(isset($_POST['token']) && $_SESSION['token']==$_POST['token']){

        if(empty($_POST['title'])){
            $err_title=" hi, what about a title?!";
        }elseif(empty($_POST['post'])){
            $err_post="you must fill text input! ";
        }else{
            $title=trim(filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING));
            $uid=$_SESSION['uid'];
            $post = trim(filter_input(INPUT_POST, 'post',FILTER_SANITIZE_STRING));

   $link = db_connect();
    mysqli_set_charset($link,"utf8");
   $title = mysqli_real_escape_string($link,$title); 
   $post = mysqli_real_escape_string($link,$post);

            $sql="INSERT INTO `posts`(`id`, `userid`, `title`, `post`, `create_at`) VALUES ('NULL','$uid','$title','$post',NOW())";
            

            $result=mysqli_query($link,$sql);
            if($result && mysqli_affected_rows($link)>0){
                $_SESSION['ms']=
                "your post created!";
                header("location: my_page2.php");
            }
             
        }
    }
}
$token = csrfToken();
$_SESSION['token'] = $token;
?>
<?php require_once 'header.php';?>

<div class="container py-5 mb-4 mt-5">
  <div class="row card">
    
    <span style="color:red;"><?= $error ;?></span>
    <form action=" " class="forum-sugnin card-body " method="post">

  <h1 class="h1 py-5 md-3 col">Add a new recipe:</h1>


  <span>Recipe Title:</span>
  <input class="form-control" name="title" type="text" value="<?= old('title') ;?>" autofocus>
  <span style="color:red;"><?= $err_title ;?></span>
  
  
  <span>Post:</span>
  <div class="form-group">
  <textarea class=" col form-control text-left" cols="30" rows="10" name="post"><?= old('post') ;?> </textarea>
  <span style="color:red;"><?= $err_post ;?></span>
  <span style="color:white;"><?= $good ;?></span>
  </div>
    
  
  <div class="checkbox mb-3">
    <input type="hidden" name="token" value="<?= $token ;?>">  
  </div>
  <div class="row justify-content-between">
  <div class="col-6">
  
  <button name="submit" class="btn btn-secondary btn-block" type="submit">Save post</button>

  <a href="my_page2.php" name="submit" class="btn btn-secondary btn-block" type="submit">cancel</a>
  </div>
    </div>
</form>    
  </div>
</div>

<?php require_once 'footer.php';?>