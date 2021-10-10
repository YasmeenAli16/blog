<?php

if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
    
    $comment_id  = $_GET["comment_id"];
  // $post_id  = $_POST["post_id"];

    require_once("config.php");
    $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
    
    
    if ($user["role"] !="admin"){
         $role ="and created_by=" .$user["id"];
       
        
        $qry = "delete from comments where id=$comment_id $role";

        $rslt = mysqli_query($con, $qry);
    }
    
    
    mysqli_close($con);
    header("location:home.php");
    
} else {
    header("location:login.php?secure=page");
}
?>