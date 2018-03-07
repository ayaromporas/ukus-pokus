<?php
class UnitsModel extends Model{

	public function Index(){

		$this->query('SELECT * FROM units ORDER BY unit_name LIMIT 10');
		$units = $this->resultSet();

		$resultArray = array($units);

		return $resultArray;

	}

	public function Insert(){

		if(isset($_POST['submit']) && isset($_POST['unitname'])){

			$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$unitname = $postArray['unitname'];

			if ($unitname != "") {

				//var_dump($unitname) ;
				$this->query("SELECT unit_name FROM units WHERE unit_name = '{$unitname}' " );
				$result = $this->resultSet();

				if (count($result) > 0) {

					Messages::setMsg('Takva jedinica mere već postoji!', 'error');
					return;

				}else{

					$this->query('INSERT INTO units (unit_name) VALUES (:unit_name)');
					$this->bind(':unit_name', $unitname);
					$this->execute();

					$lastId = $this->lastInsertId();

					Messages::setMsg('Uspešno ubačena nova jedinica mere! <br>Id poslednje jedinice mere u bazi sada je: '. $lastId, 'success');

				}
				return;
			} else {
				Messages::setMsg('Polje za naziv mora biti popunjeno', 'error');
			}


		} // kraj if post

	} // kraj insert
}
