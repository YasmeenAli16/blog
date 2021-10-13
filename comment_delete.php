<?php

if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
    
    $comment_id  = $_GET["comment_id"];
     $post_id  = $_GET["id"];

    require_once("config.php");
    $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);

   
    $qry = "select id from posts";
    $rslt = mysqli_query($con, $qry);
    if ($row = mysqli_fetch_assoc($rslt)){
        $qry = "delete from comments where id=$comment_id $role";

        $rslt = mysqli_query($con, $qry);
    }
    
  

    
    
    mysqli_close($con);
    header("location:home.php?");
    
} else {
    header("location:login.php?secure=page");
}
?>