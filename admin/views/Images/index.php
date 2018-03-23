<?php

$images = $viewmodel[0];  //spisak svih namirnica

if(($superadmin || $admin || $editor) === true){
?>


<!-- JS biblioteke -->
  <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>



<section class="box-typical mb-0 stickyHeader" >
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title text-center">
				<h3><i class="font-icon color-blue far fa-images fa-lg"></i>&nbsp; &nbsp; &nbsp; Slike &nbsp; &nbsp; &nbsp; <span class="label label-pill" id="numberImages"></span></h3>
			</div>
		</div>
	</header>
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-action-bordered">
				<form>
					<select class="form-control pointerClass" id="numberitems1" class="numberitems">
						<option value="12" selected="selected">12</option>
						<option value="24">24</option>
						<option value="48">48</option>
						<option value="96">96</option>
					</select>
				</form>
			</div>

			<div class="tbl-cell tbl-cell-title text-center">
				<form>
					<input type="text" class="form-control" name="search-keywords" id="search-keywords" placeholder="Unesite minimum 4 slova...">
				</form>

			</div>
			<div class="tbl-cell tbl-cell-action-bordered">
				<a href="<?php echo ROOT_URL; ?>images/insert"><i class="green fas fa-plus-square fa-2x"></i></a>
			</div>

		</div>
	</header>
	<div id="keywords-warning" class="text-center mx-auto"></div>
</section>
<br>

<div id="images-index">
	
</div><!--.box-typical-->

<section>
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center"  id="paginationImages">

          </ul>
   </nav>
</section>


<script type="text/javascript">



var keyword = "";
var number = 12;
var page;



$( "#numberitems1" ).change(function() {
	var number = $( "#numberitems1 option:selected" ).val();
	var keyword = $("#search-keywords").val();
	var x = keyword.length;
	if((x > 0) && (x < 4)){
		$("#images-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 4 i više slova' + "</div>");
	}else if(x > 20){
		$("#images-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 20 slova' + "</div>");
	}else{
		var number = $( "#numberitems1 option:selected" ).val();
		var keyword = $("#search-keywords").val();
		$("#keywords-warning").text ("");
		//console.log(keyword + number + page);
		return ajax_call(keyword, number, page);
	}

});

$("#search-keywords").keyup(function() {
	var keyword = $("#search-keywords").val();
	var x = keyword.length;
	if((x > 0) && (x < 4)){
		$("#images-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 4 i više slova' + "</div>");
	}else if(x > 20){
		$("#images-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 20 slova' + "</div>");
	}else{
		var number = $( "#numberitems1 option:selected" ).val();
		var keyword = $("#search-keywords").val();
		$("#keywords-warning").text ("");
		//console.log(keyword + number + page);
		return ajax_call(keyword, number, page);
	}

});


//paginacija
function pagination(page){
      var page = parseInt(page);
      console.log(page);
      var keyword = $("#search-keywords").val();
	var x = keyword.length;
	if((x > 0) && (x < 4)){
		$("#images-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 4 i više slova' + "</div>");
	}else if(x > 20){
		$("#images-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 20 slova' + "</div>");
	}else{
		var number = $( "#numberitems1 option:selected" ).val();
		var keyword = $("#search-keywords").val();
		$("#keywords-warning").text ("");
		//console.log(keyword + number + page);

	}
return ajax_call(keyword, number, page);
}

function numberIngredientsWrt(){
  var ourRequest = new XMLHttpRequest();
   ourRequest.open('GET','<?php echo ROOT_URL; ?>assets/results.json');
   ourRequest.onload = function() {
       if (ourRequest.status >= 200 && ourRequest.status < 400) {
       var ourData = JSON.parse(ourRequest.responseText);
       // alert(ourData.name);
       document.getElementById("numberImages").innerHTML=ourData.count;
     } else {
       console.log('Connected to the server but returned an error');
     }
}
ourRequest.onerror = function () {
     alert('Connection error!');
   }
 ourRequest.send();
}

//ajax funkcija
 function ajax_call(keyword, number, page) {
    $.post("<?php echo ROOT_URL; ?>assets/ajaxPhotos.php", {keyword: keyword, number: number, page: page}, function(result){
            $("#images-index").html(result);
            numberIngredientsWrt();
    });
}

$( document ).ready(function() {
	 var keyword = $("#search-keywords").val();
	var x = keyword.length;
	if((x > 0) && (x < 4)){
		$("#images-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 4 i više slova' + "</div>");
	}else if(x > 20){
		$("#images-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 20 slova' + "</div>");
	}else{
		var number = $( "#numberitems1 option:selected" ).val();
		var keyword = $("#search-keywords").val();
		$("#keywords-warning").text ("");
		//console.log(keyword + number + page);

	}
return ajax_call(keyword, number, page);
});
</script>











<!-- paginacija -->


<?php

}elseif($demo === true){
 ?>


<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-action-bordered">
				<a href="<?php echo ROOT_URL; ?>images/insert"><i class="green fas fa-plus-square fa-2x"></i></a>
			</div>
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
	$recTitle = $image['recipe_title'];

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
			<div class="card-typical-linked">Pripada receptu:<br> <?php echo $recTitle; ?>&nbsp;<span class="label label-pill"> <?php echo $recId; ?></span></div>
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
