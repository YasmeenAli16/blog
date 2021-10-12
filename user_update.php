<?php

$errors = [];

if(empty($_POST['name'])) $errors['name'] = "*Name is required";


if(empty($_POST['email'])) $errors['email'] = "*Email is required";

if(empty($_POST['mobile'])) $errors['mobile'] = "*Mobile is required";

if(empty($_POST['pass']) || empty($_POST['confirm_pass'])) $errors['pass'] = "*Password is required";
else if($_POST['confirm_pass'] != $_POST['pass']){
    $errors['confirm_pass'] = "*Password and Confirm password are not matched";

}

$name = filter_var(trim( $_POST['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) ;
$mobile = filter_var(trim($_POST['mobile']), FILTER_SANITIZE_STRING);
$pass =md5(htmlspecialchars( $_POST["pass"]));


if (!empty($_SESSION["user"])){
    $user = $_SESSION["user"];
   
    $user_id  = $_POST["user_id"];
   
    require_once("config.php");
    $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);

    
    $qry = "select id, avatar from  users where id=$user_id ";
    $rslt = mysqli_query($con, $qry);
    if ($row = mysqli_fetch_assoc($rslt)){
        $file_name  = $row["avatar"];
    }  

    if(!empty($_FILES["avatar"]["name"])){
        $file_name = "images/posts/" . date("YmdHis") . "_" . $user["id"] . "." . pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $file_name);
        unlink($_POST["avatar"]);
    }
    if(empty($errors)){
    $qry = "update users set name='$name' ,email='$email' ,avatar='$file_name' ,mobile ='$mobile', password='$pass' where id=$user_id";

    $rslt = mysqli_query($con, $qry);
    
echo mysqli_error($con);
    mysqli_close($con);
    if ($rslt){
        header("location:user_show.php?user_id=$user_id");
    }
    
 } else{
        $_SESSION['errors'] = $errors;
        header("location:user_edit.php?user_id=$user_id");
       
    }
}

    


