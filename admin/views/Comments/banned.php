<?php


if (($superadmin || $admin || $editor) === true) {


?>
	<section class="box-typical stickyHeader">
		<header class="box-typical-header">
			<div class="tbl-row">
				<div class="tbl-cell tbl-cell-title text-right">
					<h3><i class="font-icon text-danger fas fa-comments fa-lg"></i>&nbsp; &nbsp;Zabranjeni komentari &nbsp; &nbsp;<span class="label label-pill" id="numberComm"></span></h3>

				</div>
				<div class="tbl-cell tbl-cell-title text-right">
					<h3 class="nonBold">&nbsp; &nbsp; Broj komentara na strani &nbsp; &nbsp;<span class="label label-pill"></span></h3>
				</div>
				<div class="tbl-cell tbl-cell-action-bordered">
					<select id='select' class="custom-select pointerClass">
						<option value="12">12</option>
						<option value="24">24</option>
					</select>
				</div>
			</div>
		</header>
	</section>





<div id="result">
</div><!--.card-grid-->

<script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

var select = document.getElementById("select");
var pages = 12;
var choice = "";
var page;
var id;



$(document).ready(function(){

    return ajax_call(pages, choice);
});

// update comment status function
function aproveComment(id,param){
	  //alert(id);
		choice = param;

		$(event.target ).closest( "div.card-grid-col" ).fadeOut(700);
    setTimeout(function(){return ajax_call(pages,choice,id,page); }, 500);
}

// prikaz komentara po stranici
select.addEventListener("change", function(){
  data = select.options[select.selectedIndex].value;
 	// alert (page);
	pages = data;
	return ajax_call(pages, choice);
});

function pagination(pagination){
      page = parseInt(pagination) ;
      return ajax_call(pages, choice, id, page);
 }

//ispis broja komentara
	 function numberCommentsWrt(){
		  $.ajaxSetup({ cache: false });
		 	$.getJSON( '<?php echo ROOT_URL; ?>assets/results.json', function(json) {
		 		document.getElementById("numberComm").innerHTML=json.count;
		 });
	}


//ajax funkcija
  function ajax_call(pages, choicee, id, page) {
    $.post("../../admin/assets/ajaxCommentsBanned.php", {onPageComm: pages , approvedChoice: choicee, recId: id, onPage : page}, function(result){
			// alert('success');
            $("div#result").html(result);
						numberCommentsWrt();
});
			choice ="";
		// alert(choice);
}

</script>

<?php

}elseif ($demo === true) {
	$comments = $viewmodel;  //spisak svih komentara na cekanju
	$numberComments = count($comments);

?>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title text-center">
				<h3><i class="font-icon aquamarine fas fa-comments"></i>&nbsp; &nbsp; &nbsp; Neodobreni komentari &nbsp; &nbsp; &nbsp; <i class="font-icon aquamarine fas fa-comments"></i></h3>

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
