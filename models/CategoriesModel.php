<?php

class CategoriesModel extends Model{
	
	public function Index(){

		$this->query('SELECT * FROM categories WHERE status=1');
		$catRows = $this->resultSet();
		return $catRows;
	}	
}