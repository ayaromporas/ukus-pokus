<?php

class CategoriesModel extends Model{
	
	public function Index(){

		$this->query('SELECT * FROM categories');
		$catRows = $this->resultSet();
		return $catRows;
	}	
}