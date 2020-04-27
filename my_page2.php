

<?php require_once 'system/function.php';
//הפעלת סשן
session_start();
//חיבור לדאטה
$link= db_connect();
//שאילתה שמחברת בין טבלת המשתמשים לטבלת הפוסטים
mysqli_set_charset($link, "utf8");
$sql = "select posts.*,users.name from posts JOIN users on posts.userid = users.id";
$result=$result = mysqli_query($link,$sql);
if($result && mysqli_num_rows($result)> 0 ){
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
?>
<?php require_once 'header.php';?>
  <main role="main">
<style>
body {
    background-image: url('coffe.jpg');
    /* background-repeat: no-repeat; */
    background-attachment: scroll;
    background-size: 100%;


}

</style>
 
  <div class="jumbotron">
  
    <div class="container">
    <!-- משתילה את שם המשתמש כפי שהסשן שמר -->
    <div class="row h-100 align-items-center ">
    <h1 class="display-3 text-dark"> Hello <?= htmlspecialchars($_SESSION['name']); ?> </h1>
     </div>
      <hr>
      <p class="text-dark">One of the best ways to connect with other people is through food. Everyone loves to eat and experience new culinary adventures. But it’s not just about the good eats. Sharing a recipe lets you share a part of yourself. Recipes can be used to showcase your culture, tell a fun story, relive fond memories, and so much more</p>
      <p><a class="btn btn-secondary" href="add_post.php" role="button">+ Add a new recipe</a></p>
    </div>
  </div>

  <div class="container">
    <div class="row p-5">

    <?php if($data):?>
    <?php foreach($data as $row) :?>
    <div class="col-md-12 p-2">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title"><?= htmlspecialchars($row['title']); ?></h4>
    <p class="card-text"><?= htmlspecialchars($row['post']); ?></p>
     </div>
     <div class="card-footer">
     <p class="card-text">writen by: <?= htmlspecialchars($row['name']); ?></p>
        <!-- בדיקה איפה הנתונים מ2 הטבלאות שוות -->
        <?php if($_SESSION['uid'] == $row['userid']) :?>
        <p>
          <a class="btn btn-secondary" href="edit_post.php?post_id=<?= $row['id'] ;?>" role="button">Edit</a>
          <a class="btn btn-danger" href="delete.php?post_id=<?= $row['id'] ;?>" role="button">Delete</a>
        </p>
        <?php endif ;?>
       </div>
       </div>
      </div>


    
  <?php endforeach ;?>  
<?php endif ;?> 
      </div>
      </div>
      </div>
     
<?php require_once 'footer.php' ;?>
    
