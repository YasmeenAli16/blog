<?php
  
    $user =$_SESSION['user'];
    if (!empty($_SESSION["user"]) && $_SESSION["user"]["role"] =="admin") {
        $user = $_SESSION["user"];

        $errors =[];
        $old_inputs =["name"=>null ,"email"=>null ,"mobile"=>null];


        if (empty($_REQUEST['name'])) $errors["name"] = "Name is Required";
        else $old_inputs["name"] =$_REQUEST['name'];
        
        if (empty($_REQUEST['email'])) $errors["email"] = "Email is Required";
        else $old_inputs["email"] =$_REQUEST['email'];
        
        if (empty($_REQUEST['mobile'])) $errors["mobile"] = "Mobile is Required";
        else $old_inputs["mobile"] =$_REQUEST['mobile'];

        if (empty($_POST['pass']) || empty($_POST['confirm_pass'])) $errors['pass'] = "*Password is required";
        else if($_REQUEST['confirm_pass'] != $_REQUEST['pass']){
            $errors["confirm_pass"] = "Password and Confirm Password not matched";
        }

        $name = filter_var(trim( $_REQUEST['name']) ,FILTER_SANITIZE_STRING);
       

        $email = filter_var(trim( $_REQUEST['email']) ,FILTER_SANITIZE_EMAIL);
        $mobile = filter_var(trim( $_REQUEST['mobile']) ,FILTER_SANITIZE_STRING);
        $pw = htmlspecialchars($_POST['pass']);
        
        $gender = $_POST['gender'];
        $role = $_POST['role'];


        if ( empty($errors["email"] ) &&  ! filter_var($email ,FILTER_VALIDATE_EMAIL)) $errors["email"] = "Email Invalid Formate please enter  xx@yyy.cc";
        
        if(empty($errors)){
            $pass =md5($pass);
            $qry ="insert into users(email, mobile, name, password, gender ,role) values ('$email', '$mobile', '$name', '$pass', '$gender' ,'$role')";
            require_once("config.php");
            $con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
            $rslt =mysqli_query($con , $qry);
            
            mysqli_close($con);           
            header("location:users.php");        
        }else{
            $_SESSION["errors"] =$errors;
            $_SESSION["old_inputs"] =$old_inputs;
            header("location:user_create.php");       
         }

    }else{
        header("location:home.php");
    }

    ?>

