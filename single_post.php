<?php
require("header.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
<div class="container emp-profile">
  

<?php
require_once("config.php");
$id = $_GET["id"];  


$qry = "SELECT p.id, p.title, p.body, p.image, p.created_by, p.status, p.action_by, p.created_at ,u.name FROM posts p join users u  on (u.id = p.created_by) where p.id = $id order by p.created_at desc";


$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);
$post = mysqli_fetch_assoc($rslt)
?>
<div class="container-fluid py-5 my-5">

<div class="col-md-5" style="float:right">

                    <?php
                    $user = $_SESSION['user'];
                    if($user["id"] == $post["created_by"]){
                      ?>
                     
                      <a href="post_edit.php?post_id=<?= $post['id'] ?>" class="btn btn-sm btn-success"><i  style="font-size:20px" class="fa fa-pencil-square-o"></i></a>
                      <?php
                    }
                    ?>
                      <?php
                    $user = $_SESSION['user'];
                    if($user["id"] == $post["created_by"] || $user["role"] =="admin" ){
                      ?>
                    <a href="post_delete.php?post_id=<?= $post['id'] ?>" class="btn btn-sm btn-danger"><i style="font-size:20px" class="fa">&#xf014;</i></a>
                    <?php
                
                    }
                    ?>
            
                  
<h4 class="text mt-3"><a class="text-dark" href="blog-single.html"><?= $post['title']?></a></h4>
          <p><?= $post['body']?></p>
         
</div>
<img class="img-fluid mb-4" style="height:450px; width:450px; " src="<?= $post['image']?>">
<p class="text mb-2" style="font-weight:bold;">By <?= $post['name'] ?> at <?= $post['created_at'] ?></p>

        
      </div>
</div>


<div class="container">
<h3 class="mb-4">Comments:</h3>
<?php

$user = $_SESSION['user'];


$post_id = $_GET['id'];

$qry = "SELECT c.id, c.comment, c.created_by, c.created_at ,u.name FROM comments c join users u on (u.id = c.created_by) join posts p on (p.id = c.post_id) where p.id = $post_id order by c.created_at desc";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);



while($comment = mysqli_fetch_assoc($rslt)){


?>
  
  <i class="name" style=""><?= $comment['name'] ?></i> <br>
  <i style="color:red; font-size:13px"><?= $comment['created_at'] ?></i><br>
          <p style="margin-top:20px; font-size:20px"><?= $comment['comment'] ?></p>
          <?php
                    $user = $_SESSION['user'];
                    if($user["id"] == $comment["created_by"] || $user["role"] =="admin" ){
                      ?>
                    <a href="comment_delete.php?comment_id=<?= $comment['id'] ?>" class="btn btn-sm btn-danger"><i style="font-size:20px" class="fa">&#xf014;</i></a>
                    <?php
                
                    }
                    ?>
          
<hr>
        
       
                  
                 
                    <?php 
                  }
                  ?>
    
  

<div class="col-6 my-5"> 
  <form action="comment_create.php" method="POST">
  <input type="hidden" name="post_id" value="<?=$post['id']?>">
    <label for="validationTextarea">Add Comment</label>
    <textarea class="form-control pb-5 pt-5" name="comment"  id="" placeholder="Enter your comment"></textarea>
      <button type="submit" class="btn btn-secondary btn-lg btn-block mt-4">Comment</button>
      </form>
      
</div>

</div>  

 

<?php
require("footer.php");
?>


























