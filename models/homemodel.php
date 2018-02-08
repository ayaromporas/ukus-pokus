<?php

class HomeModel extends Model{
	
	public function Index(){

		$this->query('SELECT ingredient_id, ingredient_name FROM ingredients WHERE status=1 ORDER BY ingredient_name ASC');
		$ingredients = $this->resultSet();

		$this->query('SELECT recipe_id, recipe_title, prep_time, dirty_dishes, recipe_photos, avg_rating, no_votes, recipe_permalink FROM recipes WHERE status=1 ORDER BY avg_rating DESC LIMIT 6');
		$recipesPop = $this->resultSet();

		$this->query('SELECT recipe_id, recipe_title, prep_time, dirty_dishes, recipe_photos, avg_rating, no_votes, recipe_permalink  FROM recipes WHERE status=1 ORDER BY posting_time DESC LIMIT 6');
		$recipesLatest = $this->resultSet();

		$photosLatest = array();

		for ($i = 0; $i < 6; $i++) {
			$stringPhotos = $recipesLatest[$i]['recipe_photos'];
			$photos = explode(",", $stringPhotos);
		
			$query = $photos[0];
			$this->query("SELECT photo_alt, photo_link FROM photos WHERE status=1 AND photo_id=$query");
			$photo = $this->single();
			array_push($photosLatest, $photo);
		}

		$photosPop = array();

		for ($i = 0; $i < 6; $i++) {
			$stringPhotos = $recipesPop[$i]['recipe_photos'];
			$photos = explode(",", $stringPhotos);
		
			$query = $photos[0];
			$this->query("SELECT photo_alt, photo_link FROM photos WHERE status=1 AND photo_id=$query");
			$photo = $this->single();
			array_push($photosPop, $photo);
		}

		$resultArray = array($ingredients, $recipesPop, $recipesLatest, $photosLatest, $photosPop);

		return $resultArray;
		
	}
}










