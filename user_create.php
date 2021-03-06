<?php 
$active_link = "users";
require("header.php");
?>	
	<div class="login-wrap p-4 p-lg-5" style="text-align:<?=$messages ["left"]?>">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4"><?=$messages ["Add"]?> <?=$messages ["New User"]?></h3>
			      		
							<form action="user_store.php" class="signin-form" method="post">
							
			      		<div class="form-group mb-3">
						
						 
			      			<label class="label" for="name"><?=$messages ["Name"]?></label>
							
							  
			      			<input type="text" name="name" class="form-control" placeholder="<?=$messages ["Name"]?>" value="<?php if(!empty($_SESSION['old_inputs']['name'] )) echo $_SESSION['old_inputs']['name']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['name'])) echo $_SESSION['errors']['name']?></span>

				
			      		</div>
                          <div class="form-group mb-3">
			      			<label class="label" for="name"><?=$messages ["Email"]?></label>
			      			<input type="text" name="email" class="form-control" placeholder="<?=$messages ["Email"]?>" value="<?php if(!empty($_SESSION['old_inputs']['email'] )) echo $_SESSION['old_inputs']['email']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['email'])) echo $_SESSION['errors']['email']?></span>
			      		</div>
                          <div class="form-group mb-3">
			      			<label class="label" for="mobile"><?=$messages ["Mobile"]?></label>
			      			<input type="text" name="mobile" class="form-control" placeholder="<?=$messages ["Mobile"]?>" value="<?php if(!empty($_SESSION['old_inputs']['mobile'] )) echo $_SESSION['old_inputs']['mobile']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['mobile'])) echo $_SESSION['errors']['mobile']?></span>
			      		</div>    
		            <div class="form-group mb-3">
		            	<label class="label" for="password"><?=$messages ["Password"]?></label>
		              <input type="password" name="pass" class="form-control" placeholder="<?=$messages ["Password"]?>">
					  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['pass'])) echo $_SESSION['errors']['pass']?></span>
		            </div>
                    <div class="form-group mb-3">
		            	<label class="label" for="password"><?=$messages ["Confirm"]?> <?=$messages ["Password"]?></label>
		              <input type="password" name="confirm_pass" class="form-control" placeholder="<?=$messages ["Confirm"]?> <?=$messages ["Password"]?>">
					  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['confirm_pass'])) echo $_SESSION['errors']['confirm_pass']?></span>
		            </div>
                    <div class="form-group mb-3">
                        <label class="label" for="gender"><?=$messages ["Gender"]?></label><br>
						<input type="radio" name="gender" value="0" checked><?=$messages ["Male"]?> 
						<input  type="radio" name="gender" value="1"> <?=$messages ["Female"]?> 						
					</div>
                    <div class="form-group mb-3">
                        <label class="label" for="gender"><?=$messages ["Role"]?></label><br>
						<input type="radio" name="role" value="admin" checked><?=$messages ["Admin"]?>  
						<input type="radio" name="role" value="editor" checked><?=$messages ["Editor"]?>   						
					</div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-secondary submit px-3"><?=$messages ["Save"]?> </button>
		            </div>
		         
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

  <div class="m-5">
    &nbsp;
  </div>
</div>
	<?php require("footer.php");