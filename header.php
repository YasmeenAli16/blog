<?php
if (empty($_SESSION["user"])){
	header("location:login.php?secure=page");
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">


  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">

  <!-- Main Stylesheet -->
  <link href="css/style1.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
   
        <a class="nav-link active" href="home.php">Home </a>
      </li>
    </ul>
</div>

<?php //echo "Welcome " . $user['name']?>      
      <form class="form-inline" method="POST" action="logout.php">
          <button class="btn btn-secondary" type="submit">Logout</button>
      </form>
     
</nav>

</header>