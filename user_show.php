<?php
require("header.php")
?>

    <title>Blog | Profile</title>


                    
                               
                                                   

<?php
require_once("config.php");

$user = $_SESSION['user'];
if (!empty($_SESSION["user"])){

$qry = "SELECT *FROM users";


$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);
$user = mysqli_fetch_assoc($rslt)
?>

<h3 style="text-align: center; margin-top:20px">
                             My Profile
                                    </h3>





                     
                   
<div class="my-5" style="text-align: center;">
            <img src="<?= $user['avatar']?>" style=" height:200px; width:240px; float:left;border-radius:50%; margin-right:25px; margin-left:565px"/> 
                             	
</div>
               	<br>
<br>
<br>
<div class="container-fluid pt-5 my-5" style="text-align: center;">
                                  
                                    
                                    	<p class="text my-4 ml-3 pt-4" style="font-weight:bold; font-size:20px"> Name: <?= $user['name']?></p>

                                  
                                    
                                    	<p class="text mb-4 ml-3" style="font-weight:bold; font-size:20px">Email: <?= $user['email'] ?></p>

                                 
              
                            
                                    	<p class="text mb-4 ml-3" style="font-weight:bold; font-size:20px">Mobile: <?= $user['mobile'] ?></p>

                                    
                                    	<p class="text mb-4 ml-3" style="font-weight:bold; font-size:20px">Gender: <?= $user['gender'] ?></p>

                                   
                                    	<p class="text mb-4 ml-3" style="font-weight:bold; font-size:20px">Role: <?= $user['role'] ?></p>

                                        
                      <a href="user_edit.php?user_id=<?= $user['id'] ?>" class="btn btn-sm btn-success"><i  style="font-size:22px" class="fa fa-pencil-square-o"></i></a>
                     
                                    <?php
                    }else{
                        header("location:login.php?secure=page");
                    }
                        ?>
</div>
</div>

<?php
require_once("footer.php");
?>