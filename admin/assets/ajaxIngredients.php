<?php 
/* javlja se na recipe strani, radi samo ocenjivanje */
include ('../config.php');
include ('../classes/Database.php');
include ('../classes/Model.php');
include ('../models/RecipeModel.php');
$database = new Database();
$recipemodel = new RecipeModel();
$errors = array();

if(isset($_POST['id']) ){    //ako nema recepta sa trazenim id-jem u bazi, vracanje na pocetnu
	$id = $_POST['id'];
	$idRecipe = sanitize($id);
	//echo $idRecipe;
	$recipemodel->query('SELECT recipe_id, avg_rating, no_votes FROM recipes WHERE status=1 AND recipe_id=' . $idRecipe);
	$recipeId = $recipemodel->single();
	$ID = intval($recipeId['recipe_id']);
	if (!($recipeId)) {						
		$id = false;						//ako nema takvog id recepta u bazi
		header('Location: ' . ROOT_URL); //resitiiii!!!!!!!
	}else{	
		$id = true;
	}
		
	if(isset($_POST['rating'])){
		$rating = $_POST['rating'];
		//echo "rejting je" . $rating;
		$rating = intval($rating);

		if(($rating <= 0) || ($rating > 5)){
			?>
			<div class="alert alert-danger mx-2" role="alert">
			  <h5 class="alert-heading">Došlo je do greške u slanju ocene!</h5>
			  <p>Osvežite stranu i pokušajte ponovo.</p>
			</div>
			<?php
		}else{

			$nrVotesBefore = $recipeId['no_votes']; 
			$avgRatingBefore = $recipeId['avg_rating']; 
			$sumBefore = $nrVotesBefore * $avgRatingBefore; 

			$nrVotesNew = $nrVotesBefore + 1;
			$sumNew = $sumBefore + $rating; 
			$avgRatingNew = $sumNew / $nrVotesNew; 
			$avgRatingNewRound = round( $avgRatingNew, 1, PHP_ROUND_HALF_EVEN); 

			$recipemodel->query('UPDATE recipes SET avg_rating = :newrating, no_votes=:novotes WHERE recipe_id = :id');

			$recipemodel->bind(":newrating", $avgRatingNewRound);
			$recipemodel->bind(":novotes", $nrVotesNew);
			$recipemodel->bind(":id", $ID);

			$recipemodel->execute();

			?>
			<div class="alert alert-success mx-2" role="alert">
			  <h5 class="alert-heading">Hvala vam što ste ocenili ovaj recept!</h5>
			  <p>Nadamo se da ćete isprobati još neki naš recept i javiti nam kako vam se čini.</p>
			  <p class="mb-0">Prijatno! </p>
			</div>
			<?php


		}
	}
}
?>






<?php 

function sanitize($string){     //proveriti sa nekim oko sanitacije ulaznih stringova za user input comment
	$a = trim($string);
	$b = htmlspecialchars($a);
	$c = htmlentities($b);
	//$c .= "sanitize";
	return $c;
}



 ?>


