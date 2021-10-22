<?php
$active_link = "home";
require_once("header.php");
?>

<!-- blog post -->
<title>Blog | Homepage</title>
<style>
.btn-primary {
  color: #ffffff;
  background-color: #D67A9A;
background-image: linear-gradient(315deg, #D67A9A 0%, #D67A9A 74%);
  border-color: #D67A9A;
  border-radius: 12px;
  
}
.btn-transparent:hover{
  text-decoration: underline;
}
.page:hover{
  text-decoration: underline;
}


</style>
<section class="section">
  <div class="container">
  <?php 
  $user = $_SESSION['user'];
  if ($user["role"] == "admin" || $user["role"] == "editor"){ ?>
  <form class="form-inline" method="POST" action="add_post.php">
  <button  class="btn btn-outline btn-primary btn-lg py-3 mb-5" type="submit">Create Post <i class="fa fa-plus" style="font-size: 14px;"></i></button>
  </form>
  <?php 
  }
  ?>
 
  
<?php
// connect to database


$user = $_SESSION['user'];




$qry = "SELECT id from posts";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);
$results_per_page = 6;
while($post = mysqli_fetch_assoc($rslt)){

?>


      <?php

$number_of_results = mysqli_num_rows($rslt);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;
if ($user["role"] != "admin")  $status_cond ="status='approved'";
else $status_cond ="status in ('approved' ,'pending')";

// retrieve selected results from database and display them on page
$qry="SELECT p.id, p.title, p.body, p.image, p.created_by, p.status, p.action_by, p.created_at ,u.name FROM users u join posts p on (u.id = p.created_by) where $status_cond order by p.created_at desc LIMIT " . $this_page_first_result . ',' .  $results_per_page;
$rslt = mysqli_query($con, $qry);


while($post = mysqli_fetch_assoc($rslt)){


    ?>
        
          <div class="col-lg-4 col-sm-6 mb-5">
            <article class="text-center">
              <img class="img-fluid mb-4" style="height:230px; width:240px" src="<?= $post['image']?>">
              
              <p class="text mb-2">By <?= $post['name'] ?> at <?= $post['created_at'] ?></p>
              <?php 
                        
                        if($user["role"] =="admin" && $post["status"] == "pending"){
                          ?>
                          <a href="post_approve.php?post_id=<?= $post['id'] ?>&action=approved" class="btn btn-sm btn-success">Approve</a>
                          <a href="post_approve.php?post_id=<?= $post['id'] ?>&action=rejected" class="btn btn-sm btn-danger">Reject</a>
                          <?php 
                        }
                        ?>
              <h4 class="title-border mt-4"><a class="text-dark" href="single_post.php?id=<?=$post['id']?>"><?= $post['title']?></a></h4>
              <p><?php if (strlen($post['body']) >50){
                echo substr($post['body'], 0, 25). "...." ;
    
              }else{
                echo $post['body'];
              }
              ?></p>
              <a href="single_post.php?id=<?=$post['id']?>" class="btn btn-transparent">read more</a>
            
            </article>
          </div>
          <?php
    }
    ?>
          
      </div>
    </section>
    </div>

<?php
}
?>

<div class="mb-4" style="text-align: center">
<?php
// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
    
echo '<a class="page" style="font-size:20px; margin-left:10px;" href="page.php?page=' . $page . '">' . $page . '</a> ';
}
?>
</div>


<!-- /blog post -->
<?php
require_once("footer.php");
?>