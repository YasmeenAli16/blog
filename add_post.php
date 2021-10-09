<?php 
require("header.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<div class="container mt-4">

  
    <title>Blog | Create Post</title>
</head>
<body>
<div class="container my-4 py-4">
  <h2 style="margin-bottom: 50px; text-align:center;">Create Post</h2>
  <form action="post_create.php" method="POST" enctype="multipart/form-data">
  
<label for="inputPassword5">Add Title:</label>
<input type="text" name="title" class="form-control mb-4" placeholder="Title" value="<?php if(!empty($_SESSION['old_inputs']['title'] )) echo $_SESSION['old_inputs']['title']?>">
<span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['title'])) echo $_SESSION['errors']['title']?></span>
           
            	  <div class="mb-3">
    <label for="validationTextarea">Add Body:</label>

    <textarea class="form-control pb-5 pt-5" name="body" placeholder="Body"><?php if(!empty($_SESSION['old_inputs']['body'] )) echo $_SESSION['old_inputs']['body']?></textarea>
    <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['body'])) echo $_SESSION['errors']['body']?></span>
  </div>
     	  <p>Add image:</p>

           <input type="file" name="image" multiple class="form-control m-1">  
  <button type="submit" class="btn btn-secondary btn-lg btn-block mt-5 py-3">Post</button>
</div>  
</div> 
<?php 
								unset($_SESSION['errors']);
                unset($_SESSION['old_inputs']);
			
								?>
    
</form>

<?php

require("footer.php");
?>