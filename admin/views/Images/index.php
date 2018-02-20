<?php 

$images = $viewmodel[0];  //spisak svih namirnica

if(($superadmin || $admin || $editor) === true){
?>

<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title text-center">			
				<h3><i class="font-icon color-blue far fa-images"></i>&nbsp; &nbsp; &nbsp; Slike &nbsp; &nbsp; &nbsp; <i class="font-icon color-blue far fa-images"></i></h3>
			
			</div>	
			<div class="tbl-cell tbl-cell-action-bordered">
				<select>
					<option>12</option>
					<option>24</option>
					<option>48</option>
				</select>
			</div>	
		</div>
	</header>
</section>


<div class="cards-grid" data-columns="4">
<?php 

foreach ($images as $image) {

	$imageId = $image['photo_id'];
	$imageName = $image['photo_title'];
	$imageLink = $image['photo_link'];
	$imageStatus = $image['status'];
	if($imageStatus == 1){
		$status = "aktivno";
		$color = "btn-success";
	}elseif ($imageStatus == 0) {
		$status = "obrisano";
		$color = "btn-danger";
	}
	$recId = $image['recipe_id'];
	
?>

<div class="card-grid-col">
	<article class="card-typical">
		<div class="card-typical-section">
			<div class="user-card-row images-view">
				<div class="tbl-row">
					<div class="tbl-cell tbl-cell-photo">
						<span class="label label-pill"><?php echo $imageId; ?></span>
					</div>
					<div class="tbl-cell">
						<p class="user-card-row-name"><a href="#"><?php echo $imageName; ?></a></p>
						<p class="color-blue-grey-lighter wrap" style="max-width:150px;"><?php echo HOME; ?>/assets/img/<?php echo $imageLink; ?></p>
					</div>
					<div class="tbl-cell ">
						<a href="#">
							<i class="font-icon fas fa-edit grey-icon"></i>
						</a>
					</div>
					<div class="tbl-cell ">
						<a href="#">
							<i class="font-icon fas fa-trash grey-icon"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="card-typical-section card-typical-content">
			<div class="photo">
				<img src="<?php echo HOME; ?>/assets/img/<?php echo $imageLink; ?>" alt="">
			</div>
			<header class="title"><a href="#"><?php echo $imageName; ?></a></header>
		</div>
		<div class="card-typical-section">
			<div class="card-typical-linked">Pripada receptu &nbsp;<a href="#"><span class="label label-pill"><?php echo $recId; ?></span></a></div>
			<a href="#" class="card-typical-likes">
				<button type="button" class="btn btn-rounded <?php echo $color; ?> btn-sm"><?php echo $status; ?></button>
			</a>
		</div>
	</article><!--.card-typical-->
</div><!--.card-grid-col-->

				



<?php
}
?>


</div><!--.card-grid-->
<!-- <div class="clear"></div> -->

				

					
						
				
	


<!-- paginacija -->
<nav aria-label="Page navigation example" class="text-center">
  <ul class="pagination">
    
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">...</a></li>
    <li class="page-item"><a class="page-link" href="#">12</a></li>
    <li class="page-item active"><a class="page-link" href="#">13</a></li>
    <li class="page-item"><a class="page-link" href="#">14</a></li>
    <li class="page-item"><a class="page-link" href="#">...</a></li>
    <li class="page-item"><a class="page-link" href="#">37</a></li>

  </ul>
</nav>

<?php	
	
}elseif($demo === true){
 ?>


<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title text-center">			
				<h3><i class="font-icon color-blue far fa-images"></i>&nbsp; &nbsp; &nbsp; Slike &nbsp; &nbsp; &nbsp; <i class="font-icon color-blue far fa-images"></i></h3>
			
			</div>	
			<div class="tbl-cell tbl-cell-action-bordered">
				<select>
					<option>12</option>
					<option>24</option>
					<option>48</option>
				</select>
			</div>	
		</div>
	</header>
</section>


<div class="cards-grid" data-columns="4">
<?php 

foreach ($images as $image) {

	$imageId = $image['photo_id'];
	$imageName = $image['photo_title'];
	$imageLink = $image['photo_link'];
	$imageStatus = $image['status'];
	if($imageStatus == 1){
		$status = "aktivno";
		$color = "btn-success";
	}elseif ($imageStatus == 0) {
		$status = "obrisano";
		$color = "btn-danger";
	}
	$recId = $image['recipe_id'];
	
?>

<div class="card-grid-col">
	<article class="card-typical">
		<div class="card-typical-section">
			<div class="user-card-row images-view">
				<div class="tbl-row">
					<div class="tbl-cell tbl-cell-photo">
						<span class="label label-pill"><?php echo $imageId; ?></span>
					</div>
					<div class="tbl-cell">
						<p class="user-card-row-name"><a href="#"><?php echo $imageName; ?></a></p>
						<p class="color-blue-grey-lighter"><?php echo HOME; ?>/assets/img/<?php echo $imageLink; ?></p>
					</div>
					<div class="tbl-cell p-3">
						<a href="#">
							<i class="font-icon fas fa-edit grey-icon"></i>
						</a>
					</div>
					<div class="tbl-cell p-1">
						<a href="#">
							<i class="font-icon fas fa-trash grey-icon"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="card-typical-section card-typical-content">
			<div class="photo">
				<img src="<?php echo HOME; ?>/assets/img/<?php echo $imageLink; ?>" alt="">
			</div>
			<header class="title"><a href="#"><?php echo $imageName; ?></a></header>
		</div>
		<div class="card-typical-section">
			<div class="card-typical-linked">Pripada receptu &nbsp;<a href="#"><span class="label label-pill"><?php echo $recId; ?></span></a></div>
			<a href="#" class="card-typical-likes">
				<button type="button" class="btn btn-rounded <?php echo $color; ?> btn-sm"><?php echo $status; ?></button>
			</a>
		</div>
	</article><!--.card-typical-->
</div><!--.card-grid-col-->

				



<?php
}
?>


</div><!--.card-grid-->
<!-- <div class="clear"></div> -->

				

					
						
				
	


<!-- paginacija -->
<nav aria-label="Page navigation example" class="text-center">
  <ul class="pagination">
    
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">...</a></li>
    <li class="page-item"><a class="page-link" href="#">12</a></li>
    <li class="page-item active"><a class="page-link" href="#">13</a></li>
    <li class="page-item"><a class="page-link" href="#">14</a></li>
    <li class="page-item"><a class="page-link" href="#">...</a></li>
    <li class="page-item"><a class="page-link" href="#">37</a></li>

  </ul>
</nav>




<?php 

}

 ?>

  <script src="<?php echo ROOT_URL; ?>assets/js/lib/salvattore/salvattore.min.js"></script>
  <script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/lib/match-height/jquery.matchHeight.min.js"></script>
  <script>
    $(function() {
      $('.card-user').matchHeight();
    });
  </script>