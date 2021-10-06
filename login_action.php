<?php 
$errors =[];
    
    if (empty($_POST['email'])) {
        $errors["email"] = "*Email is Required";
    } 
    if (empty($_POST['pass'])) {
        $errors['pass'] = "*Password is Required";
    }
    
    if(empty($errors))
    {
   
        $email =filter_var( $_POST['email'] ,FILTER_SANITIZE_EMAIL);
        
        $pass =md5(htmlspecialchars( $_POST["pass"]));

        $qry ="select id, email, mobile, name,  gender, role,  avatar, created_at from users where email='$email' and password='$pass' and active=1";

        require_once("config.php");
        $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
        $rslt =mysqli_query($con ,$qry);

       if ($row = mysqli_fetch_assoc($rslt)){   
        $_SESSION["user"] =$row;        
        header("location:home.php");
       
        }else{
            $errors["invalid"] ="*Invalid Email or Password";
            $_SESSION['errors'] =$errors;
            header("location:login.php?email=$email" );
        }
        
        mysqli_close($con);
    }else{
        $_SESSION['errors'] =$errors;
        header("location:login.php" );
    }
    ?>