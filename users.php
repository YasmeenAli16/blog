<?php
$active_link = "users";
require("header.php");
?>
<div class="container my-4 py-4">
    <h2>Users</h2>
<table class="table table-striped mt-4">
  <thead>
    <tr>
    <th>Name</th>
	<th>Email</th>
   <th>Created At</th>
   <th></th> 
				    
    </tr>
  </thead>
  <?php

$user = $_SESSION['user'];

if ($user["role"] != "admin")  $status_cond ="status='approved'";
else $status_cond ="status in ('approved' ,'pending')";

$qry = "SELECT * from users order by created_at desc";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);



while($users = mysqli_fetch_assoc($rslt)){


?>
  <tbody>
    <tr>
     
      <td><?= $users['name']?></td>
      <td><?= $users['email']?></td>
      <td><?= $users['created_at']?></td>
      <td><a href="" class="btn btn-success btn-sm">Active</a><a href="" class="btn btn-danger btn-sm pl-3">Deactive</a></td>
    </tr>
    <?php
}
    ?>
  </tbody>
</table>
</div>
<?php
require("footer.php")
?>