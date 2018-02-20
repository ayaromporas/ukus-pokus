<?php

class RecipeModel extends Model{
 
	public function getid(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		 	return $id;
		}else{
			header('Location: ' . ROOT_URL);
		}
	} 
 
	public function Index(){

		$nr = $this->getid();   // $nr - number of recipe (id)
		
		$this->query("SELECT * FROM recipes WHERE status=1 AND recipe_id=$nr");
		$recipe = $this->single();

		if(($recipe) == NULL){
			header('Location: ' . ROOT_URL);
		}

		//dobijanje kategorija kojima pripada ovaj recept
		$recipeCatsString = $recipe['recipe_cats'];
		$recipeCatsString = trim($recipeCatsString, ",");
		$recipeCatsArray = explode(",", $recipeCatsString);
		$categoriesAll = array();
		foreach ($recipeCatsArray as $catId) {
			$this->query("SELECT cat_id, cat_name, cat_permalink FROM categories WHERE status=1 AND cat_id=$catId");
			$cat = $this->single();
			array_push($categoriesAll, $cat);
		}

		//dobijanje slika koje pripadaju ovom receptu
		$recipePhotosString = $recipe['recipe_photos'];
		$recipePhotosArray = explode(",", $recipePhotosString);
		$photosAll = array();
		foreach ($recipePhotosArray as $photoId) {
			$this->query("SELECT * FROM photos WHERE status=1 AND photo_id=$photoId");
			$photo = $this->single();
			array_push($photosAll, $photo);
		}

		//dobijanje sastojaka recepta, jedinica mere i kolicine
		$ingrsAllTogetherString = $recipe['recipe_ingrs'];
		$ingrsAllTogetherArray = explode("/", $ingrsAllTogetherString);
		$ingrsMainArray = array();
		foreach ($ingrsAllTogetherArray as $ingrsAllSingle) {

			$ingrsSingleString = $ingrsAllSingle;
			$ingrsSingleArray = explode(",", $ingrsSingleString);
			$ingrSingleId = $ingrsSingleArray[0]; 
			$ammount = $ingrsSingleArray[1]; 
			$ingrUnitId = $ingrsSingleArray[2]; 

			$this->query("SELECT ingredient_id, ingredient_name FROM ingredients WHERE status=1 AND ingredient_id=$ingrSingleId");
			$ingr = $this->single(); 

			$this->query("SELECT unit_id, unit_name FROM units WHERE status=1 AND unit_id=$ingrUnitId");
			$unit = $this->single(); 

			$ingrArray = array($ingr, $ammount, $unit);
			array_push($ingrsMainArray, $ingrArray);
		}

		//dobijanje odobrenih komentara koji pripadaju tom receptu
		$recipeId = $recipe['recipe_id'];
		$this->query("SELECT * FROM comments WHERE status=1 AND recipe_id=$recipeId ORDER BY comment_time DESC");
		$commentsAll = $this->resultSet();

		$resultArray = array($recipe, $categoriesAll, $ingrsMainArray, $commentsAll, $photosAll);

		return $resultArray;	
	}

}









