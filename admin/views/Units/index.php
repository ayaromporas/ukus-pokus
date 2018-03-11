<?php 

if(($superadmin || $admin || $editor) === true){ 
?>

<!-- JS biblioteke -->
  <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>

<section class="box-typical mb-0" >
	<header class="box-typical-header">
		<div class="tbl-row">			 
			<div class="tbl-cell tbl-cell-title text-center">			
				<h3><i class="font-icon purple fas fa-balance-scale"></i>&nbsp; &nbsp; &nbsp; Jedinice mere &nbsp; &nbsp; &nbsp; <i class="font-icon purple fas fa-balance-scale"></i></h3>			
			</div>	
		</div>
	</header>
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-action-bordered">
				<form>
					<select class="form-control" id="numberitems1" class="numberitems">
						<option value="10" selected="selected">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select>
				</form>
			</div>

			<div class="tbl-cell tbl-cell-title text-center">	
				<form>	
					<input type="text" class="form-control" name="search-keywords" id="search-keywords" placeholder="Unesite minimum 2 slova...">
				</form>
				
			</div>
			<div class="tbl-cell tbl-cell-action-bordered">
				<a href="<?php echo ROOT_URL; ?>units/insert"><i class="green fas fa-plus-square fa-2x"></i></a>
			</div>	
				
		</div>
	</header>
	<div id="keywords-warning" class="text-center mx-auto"></div>
</section>

<section class="box-typical">
	
	<div class="box-typical-body" id="units-index">
		
	</div><!--.box-typical-body-->
</section><!--.box-typical-->

<section id="paginationUnits">
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center"  id="paginationUnits">

          </ul>
   </nav>
</section>


<script type="text/javascript">



var keyword = "";
var number = 10;
var page;



$( "#numberitems1" ).change(function() {
	var number = $( "#numberitems1 option:selected" ).val();
	var keyword = $("#search-keywords").val();
	var x = keyword.length;
	if((x > 0) && (x < 2)){
		$("#units-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 2 i više slova' + "</div>");
	}else if(x > 10){
		$("#units-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 10 slova' + "</div>");
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
	if((x > 0) && (x < 2)){
		$("#units-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 2 i više slova' + "</div>");
	}else if(x > 10){
		$("#units-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 10 slova' + "</div>");
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
	if((x > 0) && (x < 2)){
		$("#units-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 2 i više slova' + "</div>");
	}else if(x > 10){
		$("#units-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 10 slova' + "</div>");
	}else{
		var number = $( "#numberitems1 option:selected" ).val();
		var keyword = $("#search-keywords").val();
		$("#keywords-warning").text ("");
		//console.log(keyword + number + page);
		
	}
return ajax_call(keyword, number, page);
}   	


//ajax funkcija
 function ajax_call(keyword, number, page) {             
    $.post("<?php echo ROOT_URL; ?>assets/ajaxUnits.php", {keyword: keyword, number: number, page: page}, function(result){
            $("#units-index").html(result);
    });
}

$( document ).ready(function() {
	 var keyword = $("#search-keywords").val();
	var x = keyword.length;
	if((x > 0) && (x < 2)){
		$("#units-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 2 i više slova' + "</div>");
	}else if(x > 10){
		$("#units-index").text ("");
		var keyword = "";
		$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ne možete uneti više od 10 slova' + "</div>");
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

}elseif ($demo === true) {
	
$units = $viewmodel[0];  //spisak svih jedinica mere

 ?>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-action-bordered">
				<a href="<?php echo ROOT_URL; ?>units/insert"><i class="green fas fa-plus-square fa-2x"></i></a>
			</div>
			<div class="tbl-cell tbl-cell-title text-center">			
				<h3><i class="font-icon purple fas fa-balance-scale"></i>&nbsp; &nbsp; &nbsp; Jedinice mere &nbsp; &nbsp; &nbsp; <i class="font-icon purple fas fa-balance-scale"></i></h3>
			
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
		<div class="table-responsive" id="#unitslist">
			<table class="table table-hover" >
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th class="text-center">Naziv</th>
						<th class="text-center">Status</th>
						<th class="text-center">Izmeni</th>
						<th class="text-center">Obriši</th>
					</tr>
				</thead>
				<tbody>

<?php 

foreach ($units as $unit) {
	
	$id = $unit['unit_id'];
	$name = $unit['unit_name'];
	$status = $unit['status'];

	if($status == 1){
		$status = "aktivno";
		$color = "btn-success";
	}elseif ($status == 0) {
		$status = "obrisano";
		$color = "btn-danger";
	}

?>
	<tr>
		<td class="text-center"><span class="label label-pill"><?php echo $id; ?></span></td>
		<td class="text-center"><?php echo $name; ?></td>
		<td class="text-center"><button type="button" class="btn btn-rounded <?php echo $color; ?> btn-sm"><?php echo $status; ?></button></td>
		<td class="table-icon-cell text-center"><i class="font-icon fas fa-edit"></i></td>
		<td class="table-icon-cell text-center"><i class="font-icon fas fa-trash"></i></td>
		
	</tr>

<?php	
	
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