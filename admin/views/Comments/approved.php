<?php

$comments = $viewmodel[0];  //spisak svih odobrenih komentara
?>


<?php

if (($superadmin || $admin || $editor) === true) {


?>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title text-center">
				<h3><i class="font-icon aquamarine fas fa-comments"></i>&nbsp; &nbsp; &nbsp; Odobreni komentari &nbsp; &nbsp; &nbsp; <i class="font-icon aquamarine fas fa-comments"></i></h3>

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




<div class="cards-grid" data-columns>


<?php

foreach ($comments as $comment) {
	$commentName = $comment['comment_name'];
	$commentEmail = $comment['comment_email'];
	$recipeTitle = $comment['recipe_title'];
	$recipeId = $comment['recipe_id'];
	$commentText = $comment['comment_text'];
	$commentTime = date_create($comment['comment_time']);
	$commentTime = date_format($commentTime, "d.m.Y g:i a");

?>
	<div class="card-grid-col">
		<article class="card-typical">
			<div class="card-typical-section">
				<div class="user-card-row">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-photo">
							<a href="#">
								<img src="<?php echo ROOT_URL; ?>assets/img/avatar-2-48.png" alt="">
							</a>
						</div>
						<div class="tbl-cell">
							<p class="user-card-row-name"><a href="#"><?php echo $commentName; ?></a></p>
							<p class="color-blue-grey-lighter"><?php echo $commentTime; ?></p>
						</div>
						<div class="tbl-cell tbl-cell-photo">
							<a href="#">
								<i class="fas fa-times-circle red fa-2x"></i>
							</a>
						</div>
						<div class="tbl-cell tbl-cell-photo">
							<a href="#">
								<i class="fas fa-check-square green fa-2x"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card-typical-section card-typical-content">

				<header class="title"><a href="#"><span class="label label-pill"><?php echo $recipeId; ?></span>&nbsp;&nbsp;<?php echo $recipeTitle; ?></a></header>
				<p><?php echo $commentText; ?></p>
			</div>
			<div class="card-typical-section">
				<div class="card-typical-linked"><?php echo $commentEmail; ?></div>

			</div>
		</article><!--.card-typical-->
	</div><!--.card-grid-col-->




<?php

}

?>


</div><!--.card-grid-->
<div class="clear"></div>


<!-- paginacija -->
<div class="col-12">

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
</div>

<?php

}elseif ($demo === true) {

?>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title text-center">
				<h3><i class="font-icon aquamarine fas fa-comments"></i>&nbsp; &nbsp; &nbsp; Odobreni komentari &nbsp; &nbsp; &nbsp; <i class="font-icon aquamarine fas fa-comments"></i></h3>

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




<div class="cards-grid" data-columns>


<?php

foreach ($comments as $comment) {
	$commentName = $comment['comment_name'];
	$commentEmail = $comment['comment_email'];
	$recipeTitle = $comment['recipe_title'];
	$recipeId = $comment['recipe_id'];
	$commentText = $comment['comment_text'];
	$commentTime = date_create($comment['comment_time']);
	$commentTime = date_format($commentTime, "d.m.Y g:i a");

?>
	<div class="card-grid-col">
		<article class="card-typical">
			<div class="card-typical-section">
				<div class="user-card-row">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-photo">
							<a href="#">
								<img src="<?php echo ROOT_URL; ?>assets/img/avatar-2-48.png" alt="">
							</a>
						</div>
						<div class="tbl-cell">
							<p class="user-card-row-name"><a href="#"><?php echo $commentName; ?></a></p>
							<p class="color-blue-grey-lighter"><?php echo $commentTime; ?></p>
						</div>
						<div class="tbl-cell tbl-cell-photo">
							<a href="#">
								<i class="fas fa-times-circle red fa-2x"></i>
							</a>
						</div>
						<div class="tbl-cell tbl-cell-photo">
							<a href="#">
								<i class="fas fa-check-square green fa-2x"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="card-typical-section card-typical-content">

				<header class="title"><a href="#"><span class="label label-pill"><?php echo $recipeId; ?></span>&nbsp;&nbsp;<?php echo $recipeTitle; ?></a></header>
				<p><?php echo $commentText; ?></p>
			</div>
			<div class="card-typical-section">
				<div class="card-typical-linked"><?php echo $commentEmail; ?></div>

			</div>
		</article><!--.card-typical-->
	</div><!--.card-grid-col-->




<?php

}

?>


</div><!--.card-grid-->
<div class="clear"></div>


<!-- paginacija -->
<div class="col-12">

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
</div>




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
