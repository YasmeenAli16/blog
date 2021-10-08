<?php
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
</style>
<section class="section">
  <div class="container">
  <form class="form-inline" method="POST" action="add_post.php">
  <button  class="btn btn-outline btn-primary btn-lg py-3 mb-5" type="submit">Create Post+</button>
  </form>
  <div class="row masonry-container">
  <?php


$qry = "SELECT p.id, p.title, p.body, p.image, p.created_by, p.status, p.action_by, p.created_at ,u.name FROM posts p join users u  on (u.id = p.created_by) where order by p.created_at desc";

require_once("config.php");
$con = mysqli_connect(HOST_NAME , DB_UN ,DB_PW,DB_NAME,DB_PORT);
$rslt = mysqli_query($con, $qry);



while($post = mysqli_fetch_assoc($rslt)){


?>
    
      <div class="col-lg-4 col-sm-6 mb-5">
        <article class="text-center">
          <img class="img-fluid mb-4" style="height:230px; width:240px" src="<?= $post['image']?>">
          <p class="text mb-2">By <?= $post['name'] ?> at <?= $post['created_at'] ?></p>
          <h4 class="title-border"><a class="text-dark" href="blog-single.html"><?= $post['title']?></a></h4>
          <p><?= $post['body']?></p>
          <a href="single_post.php?id=<?=$post['id']?>" class="btn btn-transparent">read more</a>
        </article>
      </div>
      <?php
}
?>
      
  </div>
</section>
<!-- /blog post -->
<?php
require_once("footer.php");
?>