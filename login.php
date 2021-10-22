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
  	<title><?=$messages['Login']?></title>
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
								<h2><?=$messages ["Welcome to Login"]?></h2>
								<p><?=$messages ["Don't have an account"]?> <?=$messages ["?"]?></p>
								<a href="register.php" class="btn btn-white btn-outline-white"><?=$messages ["Sign Up"]?></a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4"><?=$messages ["Sign In"]?></h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="login_action.php" class="signin-form" method="POST">
							<span class="text-danger"> 
							<?php 
								session_destroy();
								if(!empty( $_SESSION["errors"]) && !empty( $_SESSION["errors"]["invalid"])){
									echo $_SESSION["errors"]["invalid"];
								}
								if(!empty( $_GET["secure"]) &&  $_GET["secure"]=="page"){
									echo "Please Login First";
								}
			
								?>
			      		<div class="form-group mb-3">
			      			<label class="label" for="name"><?=$messages ["Email"]?></label>
			      			<input type="text" name="email" class="form-control" placeholder="<?=$messages ["Email"]?>" >
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['email'])) echo $_SESSION['errors']['email']?></span>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password"><?=$messages ["Password"]?></label>
		              <input type="password" name="pass" class="form-control" placeholder="<?=$messages ["Password"]?>">
					  <?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['pass'])) echo $_SESSION['errors']['pass']?></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3"><?=$messages ["Sign In"]?></button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-<?=$messages ["right"]?>">
			            	<label class="checkbox-wrap checkbox-primary mb-0"><?=$messages ["Remember Me"]?>
									  <input class="md-<?=$messages ["left"]?>" type="checkbox" checked>
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

