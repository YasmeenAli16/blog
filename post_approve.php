<?php

session_start();
if (!empty($_SESSION["user"]) && $_SESSION["user"]["role"] =="admin") {
    $user = $_SESSION["user"];

    $post_id  = $_GET["post_id"];
    $action  = $_GET["action"];

    require_once("config.php");
    $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);

    $qry = "update posts set status='$action' ,action_by =".$user["id"]." where id=$post_id";
    $rslt = mysqli_query($con, $qry);
    
    mysqli_close($con);
    header("location:home.php");
    
} else {
    header("location:login.php?secure=page");
}
?>