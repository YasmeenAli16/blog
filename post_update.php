<?php

if (!empty($_SESSION["user"]) && ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "editor" ) ){
    $user = $_SESSION["user"];
   
    $post_id  = $_POST["post_id"];
    $title  = $_POST["title"];
    $body  = $_POST["body"];
    require_once("config.php");
    $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);

    $qry = "select id, image from posts  where id=$post_id ";
    $rslt = mysqli_query($con, $qry);
    if ($row = mysqli_fetch_assoc($rslt)){
        $file_name  = $row["image"];
    }  

    if(!empty($_FILES["image"]["name"])){
        $file_name = "images/posts/" . date("YmdHis") . "_" . $user["id"] . "." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["image"]["tmp_name"], $file_name);
        unlink($_POST["image"]);
    }

    if ($user["role"]=="admin") $status ="approved";
    else  $status ="pending";

    $qry = "update posts set title='$title' ,body='$body' ,image='$file_name' ,status ='$status' where id=$post_id and created_by=" . $user["id"];

    $rslt = mysqli_query($con, $qry);
    

    mysqli_close($con);
    header("location:home.php?post_id=$post_id");

} else {
    header("location:login.php?secure=page");
}