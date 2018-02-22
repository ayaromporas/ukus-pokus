<?php
class ImagesModel extends Model{

	public function Index(){

		$this->query('SELECT photos.photo_id, photos.photo_title, photos.photo_alt, photos.photo_link, photos.status, photos.recipe_id, recipes.recipe_id, recipes.recipe_title FROM photos INNER JOIN recipes ON photos.recipe_id=recipes.recipe_id LIMIT 12');
		
		$images = $this->resultSet();

		$resultArray = array($images);

		return $resultArray;

	}

	public function Insert(){
		return;
	}
}
?>
