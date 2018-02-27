<?php

class CategoryModel extends Model{

	public function getid(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$this->query("SELECT * FROM categories WHERE status=1 AND cat_id = $id");
			$category = $this->single();
			if(count($category) == 0){
				header('Location: ' . ROOT_URL);
			}
		 	return $id;
		}else{
			header('Location: ' . ROOT_URL);
		}
	} 
	
	public function Index(){

		$nr = $this->getid();   // $nr - number of category (id)
		$query = "'%". $nr ."%'";
		$this->query("SELECT * FROM categories WHERE status=1 AND cat_id = $nr");
		$category = $this->single();
		if(empty($category)){
			header('Location: ' . ROOT_URL);
			
		}
		
		$this->query("SELECT recipe_id, recipe_title, prep_time, dirty_dishes, recipe_photos, avg_rating, no_votes, recipe_permalink FROM recipes WHERE status=1 AND recipe_cats like $query");
		$recipesAll = $this->resultSet();
		//print_r($recipesAll);

		$resultArray = array($category, $recipesAll);

		return $resultArray;

	}


}