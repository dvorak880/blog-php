<?php require_once 'header.php';?>
<?php
//חיבור דף הפונקציות
 require 'system/function.php';
 session_start(); 
 $err_mail = '';
 $err_pwd = '';
$error= '';
//בדיקות שהמשתמש הכניס את כל פרטיו תקין
if (isset($_POST['submit'])) {
//בדיקה שהתוקן שווה לסשן
  if(isset($_POST['token']) && $_SESSION['token'] == $_POST['token']){

    if (empty($_POST['email'])) {
  
      $err_mail = ' * email field is required';
      

    } elseif (empty($_POST['pwd'])) {
  
        $err_pwd = ' * password field is required';
      
    } else {
      //DB חיבור ל  
      $link = db_connect();
      $email = $_POST['email'];
      $pwd=$_POST['pwd'];
      //בדיקת אבטחה-שהמשתמש לא שם "/' בפרטיו
      $email = mysqli_real_escape_string($link,$email);
    $pwd = mysqli_real_escape_string($link,$pwd);
//יצירת שאילתה שבודקת אם קים משתמש כזה במערכת
      $sql =" SELECT * FROM `users` WHERE email = '$email' LIMIT 1";

//חיבור בין השאילתה לדאטה
      $result = mysqli_query($link, $sql);
  //בדיקה שהנתונים שהכניס המשתמש נמצאים במערכת לפחות פעם אחת 
      if($result && mysqli_num_rows($result) == 1){
        $data = mysqli_fetch_assoc($result);
        //בדיקה שאכן יש הצפנה לקוד בדאטה
        if(password_verify($pwd, $data['pwd'])){
       
        $_SESSION['name'] = $data['name']; 
        $_SESSION['uid'] = $data['id']; 
        $_SESSION['uip'] = $_SERVER['REMOTE_ADDR'];
        header("location: my_page2.php"); 
        }else{
          $error = "wrong user name or password!!";
        }
        
       }else{
         $error = "wrong user name or password!!";
       }
       
     } 
     }  
   }
  
   
    //כפתור שמשתמש יכול לעבור להרשמה למשתמשים חדשים
if(isset($_POST['submit2']) && !empty(($_POST['submit2']))){
  header('location: logIN.php');

}
//יצירת טוקן
$token = csrfToken();
$_SESSION['token'] = $token;
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Log in</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css.css" >
    <?php require_once 'header.php';?>
<?php  unsetSession();?> 
    
    </head>
    <body>
    
  
    <div class="container ml-5">
  <div class="row col-md-5 card">
    <div class="login-form-1 card-body">
    <h3>Enter your details:</h3>
  <form class="px-4 py-3" action="" method="post">
    <div class="form-group">
      <label for="email" style="font-family:italic;">Email:</label><br>
      <input type="text" name="email"  placeholder="Your Email"><br>
      <span style="color:red;"><?= $err_mail ;?></span>
      </div>

      <label for="pwd" style="font-family:italic;">password:</label><br>
      <input type="text" name="pwd" placeholder="Your Password "><br><span style="color:white;"><?= $err_pwd ;?></span><br><br>
      <span style="color:red;"><?= $error ;?></span><br>
      
<div class="checkbox mb-3">
    <input type="hidden" name="token" value="<?= $token ;?>">  
  </div>
      
      <input class="btn btn-dark" type="submit" name="submit" value="Open Blog"><br><br>
      <label for="">New user?</label><br>
      <input class="btn btn-secondary" type="submit" name="submit2" value="Signup">
</div>
    </form>
    </div>
</div>
</div>
  </body>
</html>
<?php require_once 'footer.php' ;?>