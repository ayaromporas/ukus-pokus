<?php

class CategoryModel extends Model{
	
	public function Index(){

		$this->query('SELECT * FROM categories');
		$catRows = $this->resultSet();
		//print_r($rows);
		return $catRows;
	}

	public function getId(){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$idq = explode("-", $id);
			$id= $idq[0];		
		 	return $id;
		}
	} 	
}