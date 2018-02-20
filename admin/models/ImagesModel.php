<?php
class ImagesModel extends Model{
	
	public function Index(){

		$this->query('SELECT * FROM photos LIMIT 12');
		$images = $this->resultSet();

		$resultArray = array($images);

		return $resultArray;
		
	}
}
?>