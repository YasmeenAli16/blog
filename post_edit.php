<?php 
require("header.php");

$user = $_SESSION['user'];
$role ="and created_by=" .$user["id"];

if (!empty($_GET["post_id"]) && ($user["role"] == "admin" || $user["role"] == "editor" ) ){    
    $post_id =$_GET["post_id"];

    require_once("config.php");

    $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
    

    if ($user["role"] !="admin") $role ="and created_by=" .$user["id"];
    $qry = "select * from posts where id=$post_id $role";

    $rslt = mysqli_query($con, $qry);
    if ($post = mysqli_fetch_assoc($rslt)){
     
    }else{
        header("location:home.php");
    }
    mysqli_close($con);
   
}else{
    header("location:home.php");
}

?>  
    <title>Blog | Edit Post</title>
</head>
<body>
<div class="container mt-4" style="text-align:<?=$messages ["left"]?>">
 
    <h2><?=$messages ["Edit Post"]?></h2>
  <div class="row">
      <div class="col-md-6 pt-3">
        <form action="post_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?=$post['id']?>">
<label for="inputPassword5"><?=$messages ["Add"]?> <?=$messages ["Title"]?>:</label>
<input type="text" name="title" class="form-control mb-4" placeholder="<?=$messages ["Title"]?>" value="<?=$post['title']?>">
           
            	  <div class="mb-3">
    <label for="validationTextarea"><?=$messages ["Add"]?> <?=$messages ["Body"]?>:</label>

    <textarea class="form-control pb-5 pt-5" name="body" placeholder="<?=$messages ["Body"]?>"><?=$post['body']?></textarea>
    <div class="invalid-feedback">
   
    </div>
  </div>
     	  <p><?=$messages ["Add"]?> <?=$messages ["Image"]?>:</p>

           <input type="file" name="image" multiple class="form-control m-1">      
           <button type="submit" class="btn btn-secondary btn-lg btn-block my-5 py-3"><?=$messages ["Save"]?></button>
        </form>
      </div>
      <div class="col-md-4">
          <img class="img" style="height:400px; width:430px; margin-left:50px; margin-top:50px; margin-right:50px;" src="<?= $post['image']?>"/>
      </div>

  </div>
</div>

    
<?php

require("footer.php");
?>