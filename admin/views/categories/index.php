<?php 

$categories = $viewmodel[0];  //spisak svih kategorija

?>

<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-action-bordered">
				<a href="<?php echo ROOT_URL; ?>categories/insert"><i class="green fas fa-plus-square fa-2x"></i></a>
			</div>
			<div class="tbl-cell tbl-cell-title text-center">			
				<h3><i class="font-icon green glyphicon glyphicon-bookmark"></i>&nbsp; &nbsp; &nbsp; Kategorije &nbsp; &nbsp; &nbsp; <i class="font-icon green glyphicon glyphicon-bookmark"></i></h3>
			
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
		<div class="table-responsive" id="#categorieslist">
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

foreach ($categories as $category) {
	
	$id = $category['cat_id'];
	$name = $category['cat_name'];
	$status = $category['status'];

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