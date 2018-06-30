<?php
class RecipesModel extends Query{

	public function Index(){

		$this->query('SELECT recipe_id, recipe_title, prep_time, dirty_dishes, status, user_id, avg_rating, no_votes FROM recipes ORDER BY recipe_title ASC LIMIT 10');
		$recipes = $this->resultSet();

		$this->query('SELECT user_id, user_name, status FROM users');
		$users = $this->resultSet();

		$resultArray = array($recipes, $users);

		return $resultArray;

	}
	public function Edit(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$this->query("SELECT * FROM recipes WHERE recipe_id = $id");
			$recipe = $this->single();
			if(count($recipe) == 0){
				header('Location: ' . ROOT_URL);
			}
			$this->query('SELECT ingredient_id, ingredient_name FROM ingredients WHERE status=1 ORDER BY ingredient_name ASC');
			$ingredientsAll = $this->resultSet();

			$this->query('SELECT unit_id, unit_name FROM units WHERE status=1 ORDER BY unit_name ASC');
			$unitsAll = $this->resultSet();

			$this->query('SELECT cat_id, cat_name FROM categories WHERE status=1 ORDER BY cat_name ASC');
			$catsAll = $this->resultSet();

			$recipePhotosString = $recipe['recipe_photos'];
			$recipePhotosArray = explode(",", $recipePhotosString);
			$photosAll = array();
			foreach ($recipePhotosArray as $photoId) {
				$this->query("SELECT * FROM photos WHERE status=1 AND photo_id=$photoId");
				$photo = $this->single();
				array_push($photosAll, $photo);
			}

			$recipeIngrs = explode("/", $recipe['recipe_ingrs']);
			// $recipeIngrsNumber = count($recipeIngrs);


			$resultArray = array($ingredientsAll, $unitsAll, $catsAll, $recipe, $photosAll, $recipeIngrs, $id );

			if(isset($_POST['submit'])){
					// $recipeTitle =$_POST['instructions'];
				if(
					(isset($_POST['authorid']) && is_string($_POST['authorid']) && !(empty($_POST['authorid'] )) )&&
					(isset($_POST['recipetitle']) && is_string($_POST['recipetitle']) && !(empty($_POST['recipetitle'])) ) &&
					(isset($_POST['permalink']) && is_string($_POST['permalink']) && !(empty($_POST['permalink'])) ) &&
					(isset($_POST['description']) && is_string($_POST['description']) && !(empty($_POST['description']))) &&
					(isset($_POST['preptime']) && is_string($_POST['preptime']) && !(empty($_POST['preptime']))) &&
					(isset($_POST['dirtydishes']) && is_string($_POST['dirtydishes']) && !(empty($_POST['dirtydishes']))) &&
					(isset($_POST['instructions']) && is_string($_POST['instructions']) && !(empty($_POST['instructions']))) &&
					(isset($_POST['ingredients']) && is_array($_POST['ingredients']) && !(empty($_POST['ingredients']))) &&
					(isset($_POST['ammount']) && is_array($_POST['ammount']) && !(empty($_POST['ammount']))) &&
					(isset($_POST['units']) && is_array($_POST['units']) && !(empty($_POST['units']))) &&
					(isset($_POST['cats']) && is_array($_POST['cats']) && !(empty($_POST['cats']))) &&
					(isset($_POST['images']) && is_array($_POST['images']) && !(empty($_POST['images'])))


				)

				{
					$descriptionZ = htmlspecialchars($_POST['description']);
					$instructionsZ = htmlspecialchars($_POST['instructions']);

					$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

					$userId =$postArray['authorid'];
					$recipeTitle =$postArray['recipetitle'];
					$recipePermalink =$postArray['permalink'];
					$description =$descriptionZ;
					$preptime =$postArray['preptime'];
					$dirtydishes =$postArray['dirtydishes'];
					$ingredientsTotal =$postArray['ingredients'];
					$ammountTotal =$postArray['ammount'];
					$unitsTotal =$postArray['units'];
					$instructions =$instructionsZ;
					$catsTotal =$postArray['cats'];
					$imagesTotal =$postArray['images'];

					//ciscenje array-a od ""
					$ingredientsTotal = array_filter($ingredientsTotal);
					$ammountTotal = array_filter($ammountTotal);
					$unitsTotal =  array_filter($unitsTotal);
					$catsTotal = array_filter($catsTotal);
					$imagesTotal = array_filter($imagesTotal);

					//brojanje koliko je uneto i provera da li je sve uneto
					$nr1 = count($ingredientsTotal);
					$nr2 = count($ammountTotal);
					$nr3 = count($unitsTotal);

					if(!($nr1 == $nr2 && $nr2 == $nr3)){

						Messages::setMsg('Problem sa unosom. Proverite da li ste za sve sastojke uneli količine i jedinice mere. Ako se ova poruka opet pojavi, obavezno obavestite superadmina o ovome.', 'error');
						return;
					}

					//pravljenje stringa za unos u polje recipe_ingrs
					$nr = $nr1;
					$i = 0;
					$recipeIngrs = "";
					while ($i < $nr) {
						$recipeIngrs .= $ingredientsTotal[$i] . "," . $ammountTotal[$i] . "," . $unitsTotal[$i] . "/";
					    $i++;
					}
					$recipeIngrs = rtrim($recipeIngrs, "/");

					//pravljenje stringa za unos u polje recipe_ingrs_id
					$recipeIngrsId = ",";
					foreach ($ingredientsTotal as $ingredient) {
						$recipeIngrsId .= $ingredient . ",";
					}

					//pravljenje stringa za unos u polje recipe_cats
					$recipeCats = ",";
					foreach ($catsTotal as $cat) {
						$recipeCats .= $cat . ",";
					}

					//pravljenje stringa za unos u polje recipe_photos
					$recipeImages = "";
					foreach ($imagesTotal as $image) {
						$recipeImages .= $image . ",";
					}
					$recipeImages = rtrim($recipeImages, ",");

					$this->query("SELECT recipe_id FROM recipes WHERE recipe_permalink = '{$recipePermalink}' ");
					$result = $this->resultSet();

						// unos recepta  u bazu
						$this->query('UPDATE recipes SET recipe_title = :recipe_title,
							 description = :description,
							 prep_time = :prep_time,
							 dirty_dishes = :dirty_dishes,
							 instructions = :instructions,
							 recipe_cats = :recipe_cats,
							 recipe_ingrs = :recipe_ingrs,
							 recipe_ingrs_id = :recipe_ingrs_id,
							 recipe_photos = :recipe_photos,
							 user_id = :user_id,
							 recipe_permalink = :recipe_permalink  WHERE recipe_id = :recipe_id');

						$this->bind(':recipe_title', $recipeTitle);
						$this->bind(':description', $description);
						$this->bind(':prep_time', $preptime);
						$this->bind(':dirty_dishes', $dirtydishes);
						$this->bind(':instructions', $instructions);
						$this->bind(':recipe_cats', $recipeCats);
						$this->bind(':recipe_ingrs', $recipeIngrs);
						$this->bind(':recipe_ingrs_id', $recipeIngrsId);
						$this->bind(':recipe_photos', $recipeImages);
						$this->bind(':user_id', $userId);
						$this->bind(':recipe_permalink', $recipePermalink);
						$this->bind(':recipe_id', $id);
						$this->execute();

						$lastId = $this->lastInsertId();



						Messages::setMsg('Uspešno ubačen nov recept! <br>Id poslednjeg recepta u bazi sada je: '. $lastId, 'success');

						return $resultArray;
				}else{
					Messages::setMsg('Sva polja moraju biti popunjena '.$recipeTitle, 'error');
				}


			}	//end if submit

			return $resultArray;

		}else{
			header('Location: ' . ROOT_URL);
		}
	} // end of edit

	public function Insert(){

		$this->query('SELECT ingredient_id, ingredient_name FROM ingredients WHERE status=1 ORDER BY ingredient_name ASC');
		$ingredientsAll = $this->resultSet();

		$this->query('SELECT unit_id, unit_name FROM units WHERE status=1 ORDER BY unit_name ASC');
		$unitsAll = $this->resultSet();

		$this->query('SELECT cat_id, cat_name FROM categories WHERE status=1 ORDER BY cat_name ASC');
		$catsAll = $this->resultSet();

		$resultArray = array($ingredientsAll, $unitsAll, $catsAll);



// prijem unosa u polja, provera i unos u bazu
if(isset($_POST['submit'])){
		// $recipeTitle =$_POST['instructions'];
	if(
		(isset($_POST['authorid']) && is_string($_POST['authorid']) && !(empty($_POST['authorid'] )) )&&
		(isset($_POST['recipetitle']) && is_string($_POST['recipetitle']) && !(empty($_POST['recipetitle'])) ) &&
		(isset($_POST['permalink']) && is_string($_POST['permalink']) && !(empty($_POST['permalink'])) ) &&
		(isset($_POST['description']) && is_string($_POST['description']) && !(empty($_POST['description']))) &&
		(isset($_POST['preptime']) && is_string($_POST['preptime']) && !(empty($_POST['preptime']))) &&
		(isset($_POST['dirtydishes']) && is_string($_POST['dirtydishes']) && !(empty($_POST['dirtydishes']))) &&
		(isset($_POST['instructions']) && is_string($_POST['instructions']) && !(empty($_POST['instructions']))) &&
		(isset($_POST['ingredients']) && is_array($_POST['ingredients']) && !(empty($_POST['ingredients']))) &&
		(isset($_POST['ammount']) && is_array($_POST['ammount']) && !(empty($_POST['ammount']))) &&
		(isset($_POST['units']) && is_array($_POST['units']) && !(empty($_POST['units']))) &&
		(isset($_POST['cats']) && is_array($_POST['cats']) && !(empty($_POST['cats']))) &&
		(isset($_POST['images']) && is_array($_POST['images']) && !(empty($_POST['images'])))


	)

	{
		$descriptionZ = htmlspecialchars($_POST['description']);
		$instructionsZ = htmlspecialchars($_POST['instructions']);

		$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$userId =$postArray['authorid'];
		$recipeTitle =$postArray['recipetitle'];
		$recipePermalink =$postArray['permalink'];
		$description =$descriptionZ;
		$preptime =$postArray['preptime'];
		$dirtydishes =$postArray['dirtydishes'];
		$ingredientsTotal =$postArray['ingredients'];
		$ammountTotal =$postArray['ammount'];
		$unitsTotal =$postArray['units'];
		$instructions =$instructionsZ;
		$catsTotal =$postArray['cats'];
		$imagesTotal =$postArray['images'];

		//ciscenje array-a od ""
		$ingredientsTotal = array_filter($ingredientsTotal);
		$ammountTotal = array_filter($ammountTotal);
		$unitsTotal =  array_filter($unitsTotal);
		$catsTotal = array_filter($catsTotal);
		$imagesTotal = array_filter($imagesTotal);

		//brojanje koliko je uneto i provera da li je sve uneto
		$nr1 = count($ingredientsTotal);
		$nr2 = count($ammountTotal);
		$nr3 = count($unitsTotal);

		if(!($nr1 == $nr2 && $nr2 == $nr3)){

			Messages::setMsg('Problem sa unosom. Proverite da li ste za sve sastojke uneli količine i jedinice mere. Ako se ova poruka opet pojavi, obavezno obavestite superadmina o ovome.', 'error');
			return;
		}

		//pravljenje stringa za unos u polje recipe_ingrs
		$nr = $nr1;
		$i = 0;
		$recipeIngrs = "";
		while ($i < $nr) {
			$recipeIngrs .= $ingredientsTotal[$i] . "," . $ammountTotal[$i] . "," . $unitsTotal[$i] . "/";
		    $i++;
		}
		$recipeIngrs = rtrim($recipeIngrs, "/");
		$recipeIngrs = preg_replace('/\s+/', '', $recipeIngrs);

		//pravljenje stringa za unos u polje recipe_ingrs_id
		$recipeIngrsId = ",";
		foreach ($ingredientsTotal as $ingredient) {
			$recipeIngrsId .= $ingredient . ",";
		}

		//pravljenje stringa za unos u polje recipe_cats
		$recipeCats = ",";
		foreach ($catsTotal as $cat) {
			$recipeCats .= $cat . ",";
		}

		//pravljenje stringa za unos u polje recipe_photos
		$recipeImages = "";
		foreach ($imagesTotal as $image) {
			$recipeImages .= $image . ",";
		}
		$recipeImages = rtrim($recipeImages, ",");

		$this->query("SELECT recipe_id FROM recipes WHERE recipe_permalink = '{$recipePermalink}' ");
		$result = $this->resultSet();

		if (count($result) > 0) {

			$recid = $result[0]['recipe_id'];

			Messages::setMsg('Recept sa takvim permalinkom već postoji, i ima id ' . $recid . '!', 'error');
			return;

		}else{
			// unos recepta  u bazu
			$this->query('INSERT INTO recipes (recipe_title, description, prep_time, dirty_dishes, instructions, recipe_cats, recipe_ingrs, recipe_ingrs_id, recipe_photos, user_id, recipe_permalink) VALUES (:recipe_title, :description, :prep_time, :dirty_dishes, :instructions, :recipe_cats, :recipe_ingrs, :recipe_ingrs_id, :recipe_photos, :user_id, :recipe_permalink)');

			$this->bind(':recipe_title', $recipeTitle);
			$this->bind(':description', $description);
			$this->bind(':prep_time', $preptime);
			$this->bind(':dirty_dishes', $dirtydishes);
			$this->bind(':instructions', $instructions);
			$this->bind(':recipe_cats', $recipeCats);
			$this->bind(':recipe_ingrs', $recipeIngrs);
			$this->bind(':recipe_ingrs_id', $recipeIngrsId);
			$this->bind(':recipe_photos', $recipeImages);
			$this->bind(':user_id', $userId);
			$this->bind(':recipe_permalink', $recipePermalink);
			$this->execute();

			$lastId = $this->lastInsertId();



			Messages::setMsg('Uspešno ubačen nov recept! <br>Id poslednjeg recepta u bazi sada je: '. $lastId, 'success');
		} // kraj unosa

	}else{
		Messages::setMsg('Sva polja moraju biti popunjena '.$recipeTitle, 'error');
	}


}	//end if submit

		return $resultArray;

	}
}
