<?php

class Query extends Model {

	public function allquery($table_name) {
		$this->query("SELECT * FROM $table_name WHERE status >= 1"); // WHERE status >= 1
		$rows = $this->resultSet();
		return $rows;	
	}

	public function soloquery($table_name, $tablename_id, $id) {
		$this->query("SELECT * FROM $table_name WHERE {$tablename_id} = '$id'"); // WHERE status >= 1
		$rows = $this->single();
		return $rows;	
	}
	
	public function specified($table_name, $column, $value) {
		$this->query("SELECT * FROM $table_name WHERE $column = '$value'"); // WHERE status >= 1
		$rows = $this->resultSet();
		return $rows;	
	}
	
	
	// Funkcija za ciscenje stringa od "latin extended"
	public function normalize ($string) {
		$table = array(
			'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
			'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
			'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
			'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
			'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
			'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
			'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
			'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
		);
		
		return strtr($string, $table);
	}
	
	public function update($id,$val1,$val2,$val3,$val4,$val5,$val6,$val7,$val8,$val9){
		$this->query('UPDATE recipes SET recipe_title = :val1, description = :val2, prep_time = :val3, dirty_dishes = :val4, instructions = :val5, recipe_cats = :val6, recipe_ingrs = :val7, recipe_ingrs_id = :val8, recipe_photos = :val9   WHERE recipe_id = :id');
		
		$this->bind(':val1', $val1);
		$this->bind(':val2', $val2);
		$this->bind(':val3', $val3);
		$this->bind(':val4', $val4);
		$this->bind(':val5', $val5);
		$this->bind(':val6', $val6);
		$this->bind(':val7', $val7);
		$this->bind(':val8', $val8);
		$this->bind(':val9', $val9);
		$this->bind(':id', $id);
		$this->execute();
		
	//	echo "<script>alert('".$id."<br>".$val1."');</script>";
	}
		
}