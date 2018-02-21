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
		return;
	}
}
