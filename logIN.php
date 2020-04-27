<?php
 require_once 'system/function.php';
 session_start();
$err_name='';
$err_email = '';
$err_pwd='';
$err_repwd='';
$errms='';
//בדיקה שהמשתמש הכניס את כל הפרטים שלו תקינים
if (isset($_POST['submit'])) {
  if(isset($_POST['token']) && $_SESSION['token'] == $_POST['token']){

    if (empty($_POST['name'])) {
  
      $err_name = ' *the Name field is required';
      
      
    } elseif (empty($_POST['email'])) {
  
      $err_email = ' *the email field is required';

    } elseif (empty($_POST['pwd'])) {
  
        $err_pwd = ' * password field is required';

      }elseif (empty ($_POST['rePassword'])) {
        $err_repwd = "you must fill verify password input!";
      
    } else {
      define('UPLOAD_MAX_SIZE', 1024 * 1024 * 20);
      $ex = ['jpg', 'jpeg', 'png', 'gif', 'bpm', 'pdf', 'doc', 'docx'];


      $name = trim($_POST['name']); 
      $email = trim($_POST['email']); 
      $pwd = trim($_POST['pwd']); 
      $repwd = trim($_POST['rePassword']); 
      
     // פונקציה שרשומה ב function.php DB  חיבור ל 
      $link = db_connect();
      $name = mysqli_real_escape_string($link,$name); 
      $email = mysqli_real_escape_string($link,$email);
      $pwd = mysqli_real_escape_string($link,$pwd);
      //שאילתה לבדיקה שלא קיים מייל כזה במערכת
      $sql1 = "SELECT email FROM `users` WHERE email = '$email'";
      //DB בדיקה שהפעולה השפיעה לפחות על שורה אחת ב   
       $result = mysqli_query($link,$sql1);
       if($result && mysqli_num_rows($result)> 0 ){
         $errms = "this email used";
       }else{
         if($pwd == $repwd){
           // הפעלת הצפנה על הקוד שנכנס ל-DB
        $pwd = password_hash($pwd, PASSWORD_BCRYPT);

        if (!empty($_FILES['image']['name'])) {

          if (is_uploaded_file($_FILES['image']['tmp_name'])) {

            if ($_FILES['image']['size'] <= UPLOAD_MAX_SIZE && $_FILES['image']['error'] == 0) {

              $file_info = pathinfo($_FILES['image']['name']);


              $file_ex = strtolower($file_info['extension']);

              if (in_array($file_ex, $ex)) {

                move_uploaded_file($_FILES['image']['tmp_name'], "img/" . $_FILES['image']['name']);
                $avatarName = $_FILES['image']['name'];
              }
            }
          }
        }
       
//שאילתה שמכניסה לDB את כל פרטי המשתמש ומעדכנת אותו
         $sql="INSERT INTO `users`(`id`, `name`, `email`, `pwd`, `role`, `avatar`, `update_at`) VALUES ('','$name','$email','$pwd','6','$avatarName',NOW())";
        //בדיקה שהשאילה השפיעה על הדאטה והתווספה לפחות שורה 1
        $result = mysqli_query($link,$sql);
        if($result && mysqli_affected_rows($link) > 0 ){
          //יצירת סשן לפרטי המשתמש
          $_SESSION['name'] = $name; 
          $_SESSION['uid'] = mysqli_insert_id($link); 
          header('location: my_page2.php');
        }else{
          $errms = "sorry have a problem!!";
        }
        
      }else{
       $err_repwd = "password and repassword are not the same!"; 
      }
       }
      
     }
     }  
    }
   //כפתור שאיתו יכול המשתמש לעבור לעמוד כניסה לרשומים
  if(isset($_POST['submit2']) && !empty(($_POST['submit2']))){
    header('location: signIN.php');

  }
  //יצירת טוקן
  $token = csrfToken();
$_SESSION['token'] = $token;
?>
 
  <body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css.css" >



      <title>log in</title>
      <?php require_once 'header.php';?>
     
      
      
    </head>
    <body>
  
    <div class="container">
  <div class="row col-md-5 card">
    <div class="login-form-1 card-body">
    <h3>Enter your details:</h3>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="name" style="font-family:italic;">Name: </label><br>
<input type="text" class="form-control" name="name" value="<?= old('name') ;?>"><br>
<span style="color:red;"><?= $err_name ;?></span>
</div>
<div class="form-group">
<label for="email" style="font-family:italic;">email:</label><br>
<input type="text" class="form-control" name="email" value="<?= old('email') ;?>"><br>
<span style="color:red;"><?= $err_email ;?><?= $errms ;?></span>
</div>

<div class="form-group">
<label for="pwd" style="font-family:italic;">password:</label><br>
<input type="text" class="form-control" name="pwd" value="<?= old('pwd') ;?>"><br>
<span style="color:red;"><?= $err_pwd ;?></span>
</div>

<div class="form-group">
<label for="email" style="font-family:italic;">Verify Password:</label>
<input name="rePassword" class="form-control" type="text" value="<?= old('rePassword') ;?>"><br>
<span style="color:red;"><?= $err_repwd ;?></span>
</div>

<div class="checkbox mb-3">
    <input type="hidden" name="token" value="<?= $token ;?>">  
  </div>
 
<input class="btn btn-dark" type="submit" name="submit" value="open blog"><br><br>
<label for=""> Have an account? </label>
<input class="btn btn-secondary" type="submit" name="submit2" value="signin">
</form>
</div>
</div>
</div>
  
</body>
</html>
<?php require_once 'footer.php' ;?>