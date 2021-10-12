<?php 
require("header.php");

$user = $_SESSION['user'];
$role ="and created_by=" .$user["id"];

if (!empty($_GET["user_id"])){    
    $user_id =$_GET["user_id"];

    require_once("config.php");

    $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
    
    $qry = "select * from users where id=$user_id";

    $rslt = mysqli_query($con, $qry);
    if ($user = mysqli_fetch_assoc($rslt)){

        
     
    }else{
        header("location:user_show.php");
    
    }
    
   
}else{
    header("location:user_show.php");
}

?> 
	<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Update Profile</h3>
			      		
							<form action="user_update.php" class="signin-form" method="POST" enctype="multipart/form-data">
                           
                            <input type="hidden" name="user_id" value="<?=$user['id']?>">
							
			      		<div class="form-group mb-3">

                          <div class="my-5" style="text-align: center;">
            <img src="<?= $user['avatar']?>" style=" height:200px; width:240px; float:left;border-radius:50%; margin-right:25px; margin-left:565px"/> 
            <input type="file" name="avatar" multiple class="form-control m-1">   
                             	
</div>
						
						 
			      			<label class="label" for="name">Name</label>
							
							  
			      			<input type="text" name="name" class="form-control" placeholder="Name" value="<?=$user['name']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['name'])) echo $_SESSION['errors']['name']?></span>

				
			      		</div>
                          <div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="text" name="email" class="form-control" placeholder="Email" value="<?=$user['email']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['email'])) echo $_SESSION['errors']['email']?></span>
			      		</div>
                          <div class="form-group mb-3">
			      			<label class="label" for="mobile">Mobile</label>
			      			<input type="text" name="mobile" class="form-control" placeholder="Mobile" value="<?=$user['mobile']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['mobile'])) echo $_SESSION['errors']['mobile']?></span>
			      		</div>    
                          <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="pass" class="form-control" placeholder="Password">
					  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['pass'])) echo $_SESSION['errors']['pass']?></span>
		            </div>
                    <div class="form-group mb-3">
		            	<label class="label" for="password">Confirm Password</label>
		              <input type="password" name="confirm_pass" class="form-control" placeholder="Confirm Password">
					  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['confirm_pass'])) echo $_SESSION['errors']['confirm_pass']?></span>
		            </div>
		        
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-secondary submit px-3">Save</button>
		            </div>
		         
		          </form>
                  <?php
                            unset($_SESSION['errors']);
                            ?>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>


  <div class="m-5">
    &nbsp;
  </div>
</div>
	<?php require("footer.php");