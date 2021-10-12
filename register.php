<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to Sign Up</h2>
								<p>Already register </p>
								<a href="login.php" class="btn btn-white btn-outline-white">Login</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign Up</h3>
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
						
						 
			      			<label class="label" for="name">Name</label>
							
							  
			      			<input type="text" name="name" class="form-control" placeholder="Name" value="<?php if(!empty($_SESSION['old_inputs']['name'] )) echo $_SESSION['old_inputs']['name']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['name'])) echo $_SESSION['errors']['name']?></span>

				
			      		</div>
                          <div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(!empty($_SESSION['old_inputs']['email'] )) echo $_SESSION['old_inputs']['email']?>">
							  <span class="text-danger"><?php if (!empty($_SESSION['errors'] )&&  !empty($_SESSION['errors']['email'])) echo $_SESSION['errors']['email']?></span>
			      		</div>
                          <div class="form-group mb-3">
			      			<label class="label" for="mobile">Mobile</label>
			      			<input type="text" name="mobile" class="form-control" placeholder="Mobile" value="<?php if(!empty($_SESSION['old_inputs']['mobile'] )) echo $_SESSION['old_inputs']['mobile']?>">
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
                    <div class="form-group mb-3">
                        <label class="label" for="gender">Gender</label><br>
						<input type="radio" name="gender" value="male" checked> Male
						<input  type="radio" name="gender" value="female"> Female						
					</div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
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

