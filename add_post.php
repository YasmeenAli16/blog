<?php 
require("header.php")
?>


    <title>Blog | Create Post</title>
</head>
<body>
<div class="container my-4 py-4">
  <h2 style="margin-bottom: 50px; text-align:center;"><?=$messages ["Create Post"]?></h2>
  <form action="post_create.php" method="POST" enctype="multipart/form-data">
  
<label for="inputPassword5"><?=$messages ["Add"]?> <?=$messages ["Title"]?>:</label>
<input type="text" name="title" class="form-control mb-4" placeholder="<?=$messages ["Title"]?>" value="<?php if(!empty($_SESSION['old_inputs']['title'] )) echo $_SESSION['old_inputs']['title']?>">
<span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['title'])) echo $_SESSION['errors']['title']?></span>
           
            	  <div class="mb-3">
    <label for="validationTextarea"><?=$messages ["Add"]?> <?=$messages ["Body"]?>:</label>

    <textarea class="form-control pb-5 pt-5" name="body" placeholder="<?=$messages ["Body"]?>"><?php if(!empty($_SESSION['old_inputs']['body'] )) echo $_SESSION['old_inputs']['body']?></textarea>
    <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['body'])) echo $_SESSION['errors']['body']?></span>
  </div>
     	  <p><?=$messages ["Add"]?> <?=$messages ["Image"]?>:</p>

           <input type="file" name="image" multiple class="form-control m-1">  
  <button type="submit" class="btn btn-secondary btn-lg btn-block mt-5 py-3"><?=$messages ["Post"]?></button>
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