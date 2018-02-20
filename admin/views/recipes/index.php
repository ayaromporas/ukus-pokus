<?php 

$recipes = $viewmodel[0];  //spisak svih recepata
$users = $viewmodel[1];  //spisak svih recepata

$nrUsers = count($users);

for ($i = 1; $i < ($nrUsers+1); $i++) {
	${"user". $i} = $users[$i-1];

	if (${"user". $i}['status'] == 1) {
		${"user". $i}['status']  = '<span class="label label-success">';
	}elseif (${"user". $i}['status'] == 2) {
		${"user". $i}['status']  = '<span class="label label-info">';
	}elseif (${"user". $i}['status'] == 3) {
		${"user". $i}['status']  = '<span class="label label-primary">';
	}elseif (${"user". $i}['status'] == 0) {
		${"user". $i}['status']  = '<span class="label label-danger">';
	}
}



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

<br><br>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
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

}elseif($demo === true){ 


?>




<br><br>
<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
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

