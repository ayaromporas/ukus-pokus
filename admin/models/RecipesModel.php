<?php
class RecipesModel extends Model{
	
	public function Index(){

		$this->query('SELECT recipe_id, recipe_title, prep_time, dirty_dishes, status, user_id, avg_rating, no_votes FROM recipes ORDER BY recipe_title ASC LIMIT 10');
		$recipes = $this->resultSet();

		$this->query('SELECT user_id, user_name, status FROM users');
		$users = $this->resultSet();

		$resultArray = array($recipes, $users);

		return $resultArray;

	}

	public function Insert(){

		$this->query('SELECT ingredient_id, ingredient_name FROM ingredients WHERE status=1 ORDER BY ingredient_name ASC');
		$ingredientsAll = $this->resultSet();

		$this->query('SELECT unit_id, unit_name FROM units WHERE status=1 ORDER BY unit_name ASC');
		$unitsAll = $this->resultSet();

		$this->query('SELECT cat_id, cat_name FROM categories WHERE status=1 ORDER BY cat_name ASC');
		$catsAll = $this->resultSet();

		$resultArray = array($ingredientsAll, $unitsAll, $catsAll);

		
		return $resultArray;

		
		
	}
}
