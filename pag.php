<?php



if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;
require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$total_pages_sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$qry = "SELECT * FROM posts LIMIT $offset, $no_of_records_per_page order by p.created_at desc";
$res_data = mysqli_query($con,$qry);
while($post = mysqli_fetch_array($res_data)){
    ?>
       <div class="col-lg-4 col-sm-6 mb-5">
        <article class="text-center">
          <img class="img-fluid mb-4" style="height:230px; width:240px" src="<?= $post['image']?>">
          
          <p class="text mb-2">By <?= $post['name'] ?> at <?= $post['created_at'] ?></p>
        
          <h4 class="title-border mt-4"><a class="text-dark" href="single_post.php?id=<?=$post['id']?>"><?= $post['title']?></a></h4>
          <p><?= $post['body']?></p>

        
        </article>
      </div>
      <?php
}
?>

<ul class="pagination">
<li><a href="?pageno=1">First</a></li>
<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
</li>
<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
</li>
<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
