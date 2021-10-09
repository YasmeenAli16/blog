<?php

$errors = [];
$old_inputs = [];

if(empty($_POST['title'])) $errors['title'] = "*Title is required";
else $old_inputs['title'] = $_POST['title'];

if(empty($_POST['body'])) $errors['body'] = "*Body is required";
else $old_inputs['body'] = $_POST['body'];


if (!empty($_SESSION["user"]) && ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "editor")){
$user= $_SESSION["user"];

$title = filter_var(trim( $_POST['title']), FILTER_SANITIZE_STRING);
$body = filter_var(trim( $_POST['body']), FILTER_SANITIZE_STRING);

$file_name = "images/posts/" . date("YmdHis") . "_" . $user["id"] . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
move_uploaded_file($_FILES["image"]["tmp_name"], $file_name);

   if ($user["role"] =="admin") $status ="approved";
    else  $status ="pending";

    if(empty($errors)){

$qry = "insert into posts (title ,body ,image ,created_by, status) values ('$title' ,'$body' ,'$file_name' ," . $user['id'] . ", '$status')";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);
mysqli_close($con);
    

if ($rslt){
    header("location:home.php");
}
    
 

}else{
    $_SESSION['errors'] = $errors;
    $_SESSION['old_inputs'] = $old_inputs;
    header("location:add_post.php");
}
}


?>