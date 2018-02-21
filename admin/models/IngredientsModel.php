<?php
class IngredientsModel extends Model{

	public function Index(){

		$this->query('SELECT * FROM ingredients ORDER BY ingredient_name ASC LIMIT 10');
		$ingredients = $this->resultSet();

		$resultArray = array($ingredients);

		return $resultArray;

	} //kraj index

	public function Insert(){

		if(isset($_POST['submit']) && isset($_POST['ingname'])){

			$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$ingname = $postArray['ingname'];

			if ($ingname != "") {	

				//var_dump($ingname) ;
				$this->query("SELECT * FROM ingredients WHERE ingredient_name = '{$ingname}' " );
				$result = $this->resultSet();				

				if (count($result) > 0) {

					Messages::setMsg('Takva namirnica već postoji!', 'error');
					return;

				}else{

					$this->query('INSERT INTO ingredients (ingredient_name) VALUES (:ing_name)');
					$this->bind(':ing_name', $ingname);
					$this->execute();

					$lastId = $this->lastInsertId();

					Messages::setMsg('Uspešno ubačena nova namirnica! <br>Id poslednje namirnice u bazi sada je: '. $lastId, 'success');

				}
				return;
			} else {
				Messages::setMsg('Polje za naziv mora biti popunjeno', 'error');
			}

		
		} // kraj if post

	} // kraj insert
} // kraj klase
?>

