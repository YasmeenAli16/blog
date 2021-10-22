<?php

$lang ="en";
if (!empty($_SESSION["lang"])){
	$lang=$_SESSION["lang"];
}
if ($lang =="ar") require_once("messages_ar.php");
else require_once("messages_en.php");
?>
<!doctype html>
<html lang="<?=$lang?>" dir="<?=$messages ["dir"]?>">
  <head>
  	<title><?=$messages['Sign Up']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container" style="text-align:<?=$messages ["left"]?>">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2><?=$messages['Sign Up']?></h2>
								<p><?=$messages['Already register']?> </p>
								<a href="login.php" class="btn btn-white btn-outline-white"><?=$messages['Login']?></a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4"><?=$messages['Sign Up']?></h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="register_action.php" class="signin-form" method="post">
								<?php 
								session_destroy();
			
								?>
			      		<div class="form-group mb-3">
						
						 
			      			<label class="label" for="name"><?=$messages['Name']?></label>
							
							  
			      			<input type="text" name="name" class="form-control" placeholder="<?=$messages['Name']?>" value="<?php if(!empty($_SESSION['old_inputs']['name'] )) echo $_SESSION['old_inputs']['name']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['name'])) echo $_SESSION['errors']['name']?></span>

				
			      		</div>
                          <div class="form-group mb-3">
			      			<label class="label" for="name"><?=$messages['Email']?></label>
			      			<input type="text" name="email" class="form-control" placeholder="<?=$messages['Email']?>" value="<?php if(!empty($_SESSION['old_inputs']['email'] )) echo $_SESSION['old_inputs']['email']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['email'])) echo $_SESSION['errors']['email']?></span>
			      		</div>
                          <div class="form-group mb-3">
			      			<label class="label" for="mobile"><?=$messages['Mobile']?></label>
			      			<input type="text" name="mobile" class="form-control" placeholder="<?=$messages['Mobile']?>" value="<?php if(!empty($_SESSION['old_inputs']['mobile'] )) echo $_SESSION['old_inputs']['mobile']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['mobile'])) echo $_SESSION['errors']['mobile']?></span>
			      		</div>    
		            <div class="form-group mb-3">
		            	<label class="label" for="password"><?=$messages['Password']?></label>
		              <input type="password" name="pass" class="form-control" placeholder="<?=$messages['Password']?>">
					  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['pass'])) echo $_SESSION['errors']['pass']?></span>
		            </div>
                    <div class="form-group mb-3"> 
		            	<label class="label" for="password"><?=$messages['Confirm']?> <?=$messages['Password']?></label>
		              <input type="password" name="confirm_pass" class="form-control" placeholder="<?=$messages['Confirm']?> <?=$messages['Password']?>">
					  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['confirm_pass'])) echo $_SESSION['errors']['confirm_pass']?></span>
		            </div>
                    <div class="form-group mb-3">
                        <label class="label" for="gender"><?=$messages['Gender']?></label><br>
						<input type="radio" name="gender" value="male" checked> <?=$messages['Male']?>
						<input  type="radio" name="gender" value="female"> <?=$messages['Female']?>						
					</div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3"><?=$messages['Sign Up']?></button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0"><?=$messages['Remember Me']?>
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-<?=$messages ["right"]?>">
										<a href="#"><?=$messages ["Forgot"]?> <?=$messages ["Password"]?></a>
									</div>
					</div>
									<div class="w-50 text-md-<?=$messages ["right"]?> ml-5">
										<a href="change_lang.php?lang=en">English </a>
										| <a href="change_lang.php?lang=ar">اللغة العربية</a>
									</div>
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

