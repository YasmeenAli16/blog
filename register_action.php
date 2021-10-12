<?php

// var_dump($_POST);
//session_start();
$errors = [];
$old_inputs = [];

if(empty($_POST['name'])) $errors['name'] = "*Name is required";
else $old_inputs['name'] = $_POST['name'];

if(empty($_POST['email'])) $errors['email'] = "*Email is required";
else $old_inputs['email'] = $_POST['email'];

if(empty($_POST['mobile'])) $errors['mobile'] = "*Mobile is required";
else $old_inputs['mobile'] = $_POST['mobile'];

if(empty($_POST['pass']) || empty($_POST['confirm_pass'])) $errors['pass'] = "*Password is required";
else if($_POST['confirm_pass'] != $_POST['pass']){
    $errors['confirm_pass'] = "*Password and Confirm password are not matched";

}
 
$name = filter_var(trim( $_POST['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) ;
$mobile = filter_var(trim($_POST['mobile']), FILTER_SANITIZE_STRING) ;
$pass = htmlspecialchars( $_POST['pass']);

$gender = $_POST['gender'];

if(empty($errors['email']) && ! filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "*Email is invalid formate ex: xxx@ymail.com";

if(empty($errors)){



$pass = md5($pass);

 $qry = "insert into users (name, email, mobile, password, gender) values ('$name', '$email', '$mobile', '$pass', '$gender')";
require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt =mysqli_query($con ,$qry);
echo mysqli_error($con);

mysqli_close($con);

if ($rslt){
    header("location:login.php");
}

}else{
    $_SESSION['errors'] = $errors;
    $_SESSION['old_inputs'] = $old_inputs;
    header("location:register.php");
}
?>