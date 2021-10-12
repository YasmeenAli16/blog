<?php



$like = $_POST["type"];
$post_id = $_POST['post_id'];

if (!empty($_SESSION["user"]) && ($_SESSION["user"]["role"] == "admin" || $_SESSION["user"]["role"] == "editor")){
$user= $_SESSION["user"];


$qry = "insert into likes (type, created_by, post_id) values ('$like'," . $user['id'] . ", $post_id)";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);
echo mysqli_error($con);
header("location:single_post.php?id=$post_id");

mysqli_close($con);
     

} else {
    header("location:login.php?secure=page");
}



?>