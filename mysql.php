<?php

if ( ! function_exists('db_connect') ) {

  function db_connect() {

    require_once 'config/database.php';

    if ( ! $link = @mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB)) {

      die('Error connecting to mysql server!');
      
    }

    return $link;
    
  }

}

if( ! function_exists('db_query') ){
  
  function db_query($sql){
    
    $data = [];
    
    $link = db_connect();
    
    $result = mysqli_query($link, $sql);
    
    if($result && mysqli_num_rows($result) > 0){
      
      while($row = mysqli_fetch_assoc($result)){
	
	$data[] = $row;
	
      }
      
    }
    
    return $data;
    
  }
  
}
