


<div class="main">
    <div class="container bestRecipes">
          <br>
              <div class="col"><hr></div>
              <div class="col"><h2 class="text-center display-4">Kategorije</h2></div>
              <div class="col"><hr></div>
          <br>

          <div class="row">

	<?php 
	$categories = $viewmodel;
	//print_r($categories);
	foreach ($categories as $category) : ?>


              <div class="col-md-4">
                    <div class="card box-shadow">	
		<a href="<?php echo ROOT_URL; ?>category/<?php echo $category['cat_id']; ?>/<?php echo $category['cat_permalink']; ?>"><img class="card-img-top" src="assets/img/cats/<?php echo $category['cat_photo']; ?>" alt="<?php echo $category['cat_name']; ?>"></a>
		<div class="card-body">
		    <a href="<?php echo ROOT_URL; ?>category/<?php echo $category['cat_id']; ?>/<?php echo $category['cat_permalink']; ?>"><h5 class="card-title text-center"><?php echo $category['cat_name']; ?></h5></a>
		    <p class="card-text"><?php echo $category['cat_description']; ?></p>
		</div>
                    </div>
                </div>

                <?php endforeach; ?>

          </div>
<br><br>
    </div><!-- kraj container -->	
</div><!-- kraj main -->	


