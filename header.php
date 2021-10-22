<?php

$user = $_SESSION['user'];
if (empty($_SESSION["user"])){
	header("location:login.php?secure=page");
}
$lang ="en";
if (!empty($_SESSION["lang"])){
  $lang=$_SESSION["lang"];
}

if ($lang =="ar") require_once("messages_ar.php");
else require_once("messages_en.php");

?>
<!DOCTYPE html>
<html lang="<?=$lang?>" dir="<?=$messages ["dir"]?>">

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
   
      <li class="nav-item <?php 
    
    if($active_link  =="home")echo "active";
      ?>">
        <a class="nav-link " href="home.php"><?=$messages ["Home"]?></a>
      </li>

      <?php if ($user["role"] == "admin") { ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle <?php 
 
        if($active_link  =="users")echo "active";
      ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$messages ["Users"]?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="user_create.php"><?=$messages ["Add"]?> <?=$messages ["User"]?></a>
          <a class="dropdown-item" href="users.php"><?=$messages ["List"]?> <?=$messages ["Users"]?></a>
          

        </div>
      </li>
        <?php }?>
     
    </ul>
   

    <ul class="navbar-nav"> 
    <li class="nav-item">
   
        <a class="nav-link active" <?php  if ($lang =="ar"){
      ?>
     href="change_lang.php?lang=en"><?=$messages ["اللغة العربية"]?></a>
      <?php
  }else{
    ?>
    <a class="nav-link active" href="change_lang.php?lang=ar">
 <?=$messages ["English"]?></a>    <?php
  }?>
      </li>
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <?=$user["name"]?>
  </a>
  
  <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
  <a class="dropdown-item" href="user_show.php"><?=$messages ["Profile"]?></a>
  <a class="dropdown-item" href="logout.php"><?=$messages ["Logout"]?></a>
 
      </li>
    </ul>
</div>
     
     
</nav>

</header>