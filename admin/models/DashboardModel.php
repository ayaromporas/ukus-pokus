<?php
class DashboardModel extends Model{

	public function Index(){
		//$rows =  array();
		$this->query("SELECT * FROM recipes"); 
		$rows = $this->resultSet();

		$this->query("SELECT * FROM categories"); 
		$rows1 = $this->resultSet();

		$this->query("SELECT * FROM ingredients"); 
		$rows2 = $this->resultSet();
		
		return array($rows, $rows1, $rows2);


	}
}