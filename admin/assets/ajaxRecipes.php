<?php
/* javlja se na recipe stranici */
include ('../config.php');
include ('../classes/Database.php');
include ('../classes/Model.php');

$database = new Database();

$errors = array();

$page = 1;
$number = 10;
$keyword = "%%";


if(isset($_POST)){
	$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
}

if(isset($postArray['page']) ){
	$page = $postArray['page'];
	// echo "Promenljiva page: ";
	// var_dump($page);
}

if(isset($postArray['number']) ){
	$number = $postArray['number'];
	// echo "Promenljiva number: ";
	// var_dump($number);
}

if(isset($postArray['keyword']) ){
	$keyword = $postArray['keyword'];
	$keyword = "%". $keyword . "%";
	//echo "Promenljiva keyword: ";
	//var_dump($keyword);
}

//upit u bazu
$database->query("SELECT recipe_id, recipe_title, description, prep_time, dirty_dishes, status, user_id, avg_rating, no_votes, recipe_permalink FROM recipes WHERE recipe_title LIKE '{$keyword}' ORDER BY recipe_id");
$recipes = $database->resultSet();
$numberResults = count($recipes);

//definisanje limita i paginacije
$limit = $number; // broj komada po strani

//echo $numberResults;

$countRecipesArray = array('count' => $numberResults);
	$fp = fopen('results.json', 'w');
	fwrite($fp, json_encode($countRecipesArray, JSON_PRETTY_PRINT));   //here it will print the array pretty
	fclose($fp);

if($numberResults == 0){
	echo '<div class="alert alert-warning alert-dismissible fade show keywords-warning mx-auto mt-3" role="alert">Nema takvog recepta u bazi.</div>';
	return;
}else{



?>

<table id="recipeslist" class="table">

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

	// Ispis pronadjenih jedinica mere petljom
             $x = ($page-1) * $limit;
             $y = $x + $limit;

             for ($i = $x; $i < $y; $i++){

                	 if (!($x > ($numberResults-1))) {


	$recId = $recipes[$x]['recipe_id'];
	$recName = $recipes[$x]['recipe_title'];
	$recTime = $recipes[$x]['prep_time'];
	$recDishes = $recipes[$x]['dirty_dishes'];
	$recRating = $recipes[$x]['avg_rating'];
	$recVotes = $recipes[$x]['no_votes'];
	$recStatus = $recipes[$x]['status'];
	$recAuthor = $recipes[$x]['user_id'];
	$recPermalink = $recipes[$x]['recipe_permalink'];

	if($recStatus == 1){
		$status = "aktivno";
		$color = "label label-success";
	}elseif ($recStatus == 0) {
		$status = "obrisano";
		$color = "label label-danger";
	}

	//upit u bazu
	$database->query("SELECT user_id, user_name, status FROM users WHERE user_id=$recAuthor");
	$user = $database->single();
	$userId = $user['user_id'];
	$userName = $user['user_name'];
	$userStatus = $user['status'];

	if($userStatus == 0){
		$span = 'class="label label-danger"';
	}elseif ($userStatus == 1) {
		$span = 'class="label label-success"';
	}elseif ($userStatus == 2) {
		$span = 'class="label label-info"';
	}elseif ($userStatus == 3) {
		$span = 'class="label label-primary"';
	}



?>
					<tr>
						<td class="text-center"><span class="label label-pill"><?php echo $recId; ?></span></td>
						<td class="text-center"><a href="<?php echo HOME; ?>recipe/<?php echo $recId; ?>/<?php echo $recPermalink; ?>" target="blank" class="dark-link"><?php echo $recName; ?></a></td>
						<td class="text-center"><strong><span <?php echo $span  ; ?> ><?php echo $userName  ; ?></span></strong></td>
						<td class="text-center"><?php echo $recTime; ?> &nbsp; min</td>
						<td class="text-center"><?php echo $recDishes; ?> &nbsp; posuda</td>
						<td class="text-center"><?php echo $recRating; ?></td>
						<td class="text-center"><?php echo $recVotes; ?> &nbsp; </td>
						<td class="text-center"><span class="<?php echo $color; ?>"><?php echo $status; ?></span></td>
						<td class="table-icon-cell text-center"><a href="<?php echo ROOT_URL; ?>recipes/edit/<?php echo $id; ?>"><i class="font-icon fas fa-edit"></i></a></td>
						<td class="table-icon-cell text-center"><i class="font-icon fas fa-trash"></i></td>

					</tr>

<?php
$x++;
	}
}
 ?>


				</tbody>
			</table>
<?php


} // kraj else glavni - ako ima rezultata

?>

<section class="text-center">
	<br>
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center">

	<?php

/*-------------------------------------------------------iscrtavanje paginacije -----------------------------------*/
	 if ($numberResults > 0){  //iscrtavanje paginacije

		$i = ($numberResults/$limit);
		$i = ceil($i);

		if ($i == 1) {				/* prvi slucaj */
			echo '<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';

		}elseif (($i > 1) && ($i < 8)) {
			for ($e = 1; $e < ($i+1); $e++) {
				if ($e == $page) {
					echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
				}else{
					echo '<li class="page-item"><span id="' . $e. '" class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
				       }
			}

		}elseif ($i >= 8) {			/*drugi slucaj  */
			if ($page >= 5){
				if ($page > ($i-4)) {
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
					for ($e = ($i-4); $e < ($i+1); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id="' . $e. '" class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
						}
					}

				}else{
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';

					for ($e = $page-2; $e < ($page+3); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id="' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
						}
					}

					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
					echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
				}

			}elseif ($page < 5) {
				for ($e = 1; $e < 6; $e++) {
					if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
					}else{
						echo '<li class="page-item"><span id="' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
					}
				}
				echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
				echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
			}
		} /* treci slucaj */
	?>
       </ul>
   </nav>
</section>
<?php
	}
