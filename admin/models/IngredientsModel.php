<?php
class IngredientsModel extends Model{
	
	public function Index(){

		$this->query('SELECT * FROM ingredients ORDER BY ingredient_name ASC LIMIT 10');
		$ingredients = $this->resultSet();

		$resultArray = array($ingredients);

		return $resultArray;
		
	}
}
?>