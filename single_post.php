<?php
require("header.php")
?>


    <title>Blog | Post</title>

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

<div class="col-md-5" style="float:<?=$messages ["right"]?>">

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
          <p class="text pt-4" style="font-size:20px;"><?=wordwrap($post['body'],35,"<br>\n")?></p>

         
</div>
<img class="img-fluid mb-4" style="height:450px; width:450px; " src="<?= $post['image']?>">
<p class="text" style="margin-right:180px;font-weight:bold;text-align:<?=$messages ["left"]?>"><?=$messages ["By"]?> <?= $post['name'] ?> <?=$messages ["at"]?> <?= $post['created_at'] ?></p>


<?php 


$like = $_GET['id'];
$post_id = $_GET['id'];
 

$qry = "SELECT post_id, COUNT(id) count from likes where post_id = $post_id";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);



$like = mysqli_fetch_assoc($rslt)


?>

<div class="col-6 mb-5 ml-5">
<form action="like_create.php" method="POST">
  <input type="hidden" name="post_id" value="<?=$post['id']?>">
    <input type="hidden" name="type">
      <button type="submit" class="btn btn-sm btn-info mt-3" style="float:<?=$messages ["left"]?>"><i style="font-size:26px" class="fa fa-thumbs-up"></i><i style="font-size:18px"> <?= $like['count']?></i> </button>
      </form>
      
      </div>
</div>
  


 <div class="container"> 

<h3 class="mb-4" style="text-align:<?=$messages ["left"]?>"><?=$messages ["Comments"]?>:</h3>
<?php

$user = $_SESSION['user'];


$post_id = $_GET['id'];

$qry = "SELECT c.id, c.comment, c.post_id, c.created_by, c.created_at ,u.name FROM comments c join users u on (u.id = c.created_by) join posts p on (p.id = c.post_id) where p.id = $post_id order by c.created_at desc";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);



while($comment = mysqli_fetch_assoc($rslt)){


?>

   <input type="hidden" name="post_id">
   <div style="text-align:<?=$messages ["left"]?>; margin-right:100px">
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
</div>



        
       
                  
                 
                    <?php 
                  }
                  ?>


    
  

<div class="col-6 my-5 ml-5">
  <form action="comment_create.php" method="POST">
  <input type="hidden" name="post_id" value="<?=$post['id']?>">
 
    <textarea class="form-control pb-5 pt-5" name="comment"  id="" placeholder="<?=$messages ["Write"]?> <?=$messages ["your Comment"]?>"></textarea>
      <button type="submit" class="btn btn-secondary btn-lg btn-block mt-4"><?=$messages ["Comment"]?></button>
      </form>
      
</div>

</div>  
</div>

 

<?php
require("footer.php");
?>


























