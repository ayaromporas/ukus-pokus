<?php




?>

<section class="card mb-3" id="role-info">
	<header class="card-header">
		<span class="label label-success">Superadmin</span>&nbsp;
		<span class="label label-info">Admin</span>&nbsp;
		<span class="label label-primary">Editor</span>&nbsp;
		<span class="label label-danger">Banovan</span>&nbsp;

	</header>
</section>

<?php

if (($superadmin || $admin || $editor) === true){
 ?>

<!-- JS biblioteke -->
  <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>

<section class="box-typical mb-0 stickyHeader" >
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-title text-center">
				<h3><i class="font-icon color-red fas fa-utensils"></i>&nbsp; &nbsp; &nbsp; Recepti &nbsp; &nbsp; &nbsp;<span class="label label-pill" id="numberRecipes"></span></h3>
			</div>
		</div>
	</header>
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-action-bordered">
				<form>
					<select class="form-control pointerClass" id="numberitems1" class="numberitems">
						<option value="10" selected="selected">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select>
				</form>
			</div>

			<div class="tbl-cell tbl-cell-title text-center">
				<form>
					<input type="text" class="form-control" name="search-keywords" id="search-keywords" placeholder="Unesite minimum 4 slova...">
				</form>

			</div>
			<div class="tbl-cell tbl-cell-action-bordered">
				<a href="<?php echo ROOT_URL; ?>recipes/insert"><i class="green fas fa-plus-square fa-2x"></i></a>
			</div>

		</div>
	</header>
	<div id="keywords-warning" class="text-center mx-auto"></div>
</section>

<section class="box-typical">
	<div class="box-typical-body" id="recipes-index">

	</div><!--.box-typical-body-->
</section><!--.box-typical-->

<section>
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center"  id="paginationRecipes">

          </ul>
   </nav>
</section>




<script type="text/javascript">



var keyword = "";
var number = 10;
var page = 1;



$( "#numberitems1" ).change(function() {
	var number = $( "#numberitems1 option:selected" ).val();
	var keyword = $("#search-keywords").val();
	var x = keyword.length;
	if((x > 0) && (x < 4)){
		$("#recipes-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 4 i više slova' + "</div>");
	}else if(x > 50){
		$("#recipes-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 50 slova' + "</div>");
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
		$("#recipes-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 4 i više slova' + "</div>");
	}else if(x > 50){
		$("#recipes-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 50 slova' + "</div>");
	}else{
		var number = $( "#numberitems1 option:selected" ).val();
		var keyword = $("#search-keywords").val();
		$("#keywords-warning").text ("");
		console.log(keyword + number + page);
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
		$("#recipes-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 4 i više slova' + "</div>");
	}else if(x > 50){
		$("#recipes-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 50 slova' + "</div>");
	}else{
		var number = $( "#numberitems1 option:selected" ).val();
		var keyword = $("#search-keywords").val();
		$("#keywords-warning").text ("");
		//console.log(keyword + number + page);

	}
return ajax_call(keyword, number, page);
}


function numberRecipesWrt(){
	 $.ajaxSetup({ cache: false });
	 $.getJSON( '<?php echo ROOT_URL; ?>assets/results.json', function(json) {
		 document.getElementById("numberRecipes").innerHTML=json.count;
	});
}

//ajax funkcija
 function ajax_call(keyword, number, page) {
    $.post("<?php echo ROOT_URL; ?>assets/ajaxRecipes.php", {keyword: keyword, number: number, page: page}, function(result){
            $("#recipes-index").html(result);
            numberRecipesWrt();
    });
}

$( document ).ready(function() {
	 var keyword = $("#search-keywords").val();
	var x = keyword.length;
	if((x > 0) && (x < 4)){
		$("#recipes-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 4 i više slova' + "</div>");
	}else if(x > 50){
		$("#recipes-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 50 slova' + "</div>");
	}else{
		var number = $( "#numberitems1 option:selected" ).val();
		var keyword = $("#search-keywords").val();
		$("#keywords-warning").text ("");
		//console.log(keyword + number + page);

	}
return ajax_call(keyword, number, page);
});


</script>










<?php

}elseif($demo === true){


?>




<br>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-action-bordered">
				<a href="<?php echo ROOT_URL; ?>recipes/insert"><i class="green fas fa-plus-square fa-2x"></i></a>
			</div>
			<div class="tbl-cell tbl-cell-title text-center">
				<h3><i class="font-icon color-red fas fa-utensils"></i>&nbsp; &nbsp; &nbsp; Recepti &nbsp; &nbsp; &nbsp; <i class="font-icon color-red fas fa-utensils"></i></h3>

			</div>
			<div class="tbl-cell tbl-cell-action-bordered">
				<select>
					<option>10</option>
					<option>25</option>
					<option>50</option>
				</select>
			</div>
		</div>
	</header>
	<div class="box-typical-body">
		<div class="table-responsive" id="#recipelist">
			<table class="table table-hover" >
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Naziv</th>
						<th class="text-center">Autor</th>
						<th class="text-center"><i class="font-icon far fa-clock"></i></th>
						<th class="text-center">Isprljano</th>
						<th class="text-center"><i class="font-icon fas fa-star"></th>
						<th class="text-center">Glasova</th>
						<th class="text-center">Status</th>
						<th class="text-center">Izmeni</th>
						<th class="text-center">Obriši</th>
					</tr>
				</thead>
				<tbody>

<?php
$i =0;
foreach ($recipes as $recipe) {

	$recId = $recipe['recipe_id'];
	$recName = $recipe['recipe_title'];
	$recTime = $recipe['prep_time'];
	$recDishes = $recipe['dirty_dishes'];
	$recRating = $recipe['avg_rating'];
	$recVotes = $recipe['no_votes'];
	$recStatus = $recipe['status'];
	$recAuthor = $recipe['user_id'];

	if($recStatus == 1){
		$status = "aktivno";
		$color = "btn-success";
	}elseif ($recStatus == 0) {
		$status = "obrisano";
		$color = "btn-danger";
	}

?>
					<tr>
						<td class="text-center"><span class="label label-pill"><?php echo $recId; ?></span></td>
						<td class="text-center"><?php echo $recName; ?></td>
						<td class="text-center"><strong><?php echo ${"user". $recAuthor}["status"]  ; ?> <?php echo ${"user".$recAuthor}['user_name']  ; ?></span></strong></td>
						<td class="text-center"><?php echo $recTime; ?> &nbsp; min</td>
						<td class="text-center"><?php echo $recDishes; ?> &nbsp; posuda</td>
						<td class="text-center"><?php echo $recRating; ?></td>
						<td class="text-center"><?php echo $recVotes; ?> &nbsp; </td>
						<td class="text-center"><button type="button" class="btn btn-rounded <?php echo $color; ?> btn-sm"><?php echo $status; ?></button></td>
						<td class="table-icon-cell text-center"><i class="font-icon fas fa-edit"></i></td>
						<td class="table-icon-cell text-center"><i class="font-icon fas fa-trash"></i></td>

					</tr>

<?php
$i++;
}
 ?>


				</tbody>
			</table>
		</div>
	</div><!--.box-typical-body-->
</section><!--.box-typical-->


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
