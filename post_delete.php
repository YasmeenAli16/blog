<?php

if (!empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
    // validate and filter
    $post_id  = $_GET["id"];

    require_once("config.php");
    $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
    
    

    $qry = "select id, image from posts  where id=$post_id and created_by = " .$user['id'];
    $rslt = mysqli_query($con, $qry);
    if ($row = mysqli_fetch_assoc($rslt)){
        unlink( $row["image"]);
        $qry = "delete from posts where id=$post_id";

        $rslt = mysqli_query($con, $qry);
    }
    
    mysqli_close($con);
    header("location:home.php");
    
} else {
    header("location:index.php?secure=page");
}
?>