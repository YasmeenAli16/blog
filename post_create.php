<?php
if (!empty($_SESSION["user"]) && ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "editor")){
$user= $_SESSION["user"];


$title  = $_POST["title"];
$body  = $_POST["body"];
$file_name = "images/posts/" . date("YmdHis") . "_" . $user["id"] . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
move_uploaded_file($_FILES["image"]["tmp_name"], $file_name);

   if ($user["role"] =="admin") $status ="approved";
    else  $status ="pending";
$qry = "insert into posts (title ,body ,image ,created_by, status) values ('$title' ,'$body' ,'$file_name' ," . $user['id'] . ", '$status')";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);

 //echo mysqli_error($con);

 header("location:home.php");

mysqli_close($con);

}else{
    header("location:login.php?secure=page");
}

?>