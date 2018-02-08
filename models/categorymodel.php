<?php

class CategoryModel extends Model{
	
	public function Index(){

		// $this->query('SELECT * FROM categories');
		// $catRows = $this->resultSet();
		// //print_r($rows);
		// return $catRows;

		$catId = $this->getid();

		$this->query("SELECT cat_name FROM categories WHERE status=1 AND cat_id=$catId");
		 $cat = $this->single();

		$query = "recipe_cats like '%" . "," .$catId. "," . "%' ";
		$this->query("SELECT recipe_id, recipe_title, prep_time, dirty_dishes, recipe_photos, avg_rating, no_votes, recipe_permalink  FROM recipes WHERE (status=1) AND $query" );
		$recipeResults = $this->resultSet();

	
		return $cat;
	}

	public function getId(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];		
		 	return $id;
		} else{
			header('Location: ' . ROOT_URL);
		}
	} 	
}