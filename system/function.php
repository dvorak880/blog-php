<?php


if ( ! function_exists('db_connect') ) {

  function db_connect() {

    if ( ! $link = @mysqli_connect("localhost", "root", "", "bloger")) {

      die('Error connecting to mysql server!');
      
    }

    return $link;
    
  }

}

if ( ! function_exists('csrfToken') ) {

  function csrfToken() {

  $token = sha1(time(). md5("dvorakeran"));  

    return $token;
    
  }

}


if( !function_exists("old")){
  function old($fn){
    return isset($_POST[$fn])?$_POST[$fn]:"";
  }
}
if( !function_exists("unsetSession")){
  function unsetSession(){
    if(isset($_SESSION['ms']) && !empty($_SESSION['ms'])){
      unset($_SESSION['ms']);
    }
  }
}


if( !function_exists("vUser")){
  function vUser(){
    if(!empty($_SESSION['uip'])){
      if($_SESSION['uip'] != $_SERVER['REMOTE_ADDR']){
      session_destroy();
      header("location: signIN.php");
      }
    }
  }
}

if( !function_exists("uConnected")){
  function uConnected(){
    if(empty($_SESSION['userid'])){
     header("location: signIN.php"); 
    }
  }
}


if( !function_exists("mySessionStart")){
  function mySessionStart(){
    session_name('myname');
    session_start();
    session_regenerate_id();
    
  }
}


if( !function_exists("getAvatar")){
  function getAvatar(){
    $link = db_connect();
    $sql = "select avatar from users where id = '{$_SESSION['uid']}'";
    $result = mysqli_query($link, $sql);
   
    if($result && mysqli_num_rows($result) == 1){
     $avatar = mysqli_fetch_assoc($result);
     return $avatar['avatar'];
    }else{
      return "defualt.png";
    }
    
  }
}
