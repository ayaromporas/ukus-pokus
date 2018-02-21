<?php
class UnitsModel extends Model{

	public function Index(){

		$this->query('SELECT * FROM units ORDER BY unit_name ASC');
		$units = $this->resultSet();

		$resultArray = array($units);

		return $resultArray;

	}

	public function Insert(){
		return;
	}



}
