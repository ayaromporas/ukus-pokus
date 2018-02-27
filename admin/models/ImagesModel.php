<?php
class ImagesModel extends Model{

	public function Index(){

		$this->query('SELECT photos.photo_id, photos.photo_title, photos.photo_alt, photos.photo_link, photos.status, photos.recipe_id, recipes.recipe_id, recipes.recipe_title FROM photos INNER JOIN recipes ON photos.recipe_id=recipes.recipe_id LIMIT 12');
		
		$images = $this->resultSet();

		$resultArray = array($images);

		return $resultArray;

	}

	public function Insert(){
		

		if(isset($_POST['submit'])){			

			$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


			if (($postArray['photoname'] && $postArray['photoalt'] && $postArray['photolink'] ) != "") {		
			
				$photoname = $postArray['photoname'];
				$photoalt = $postArray['photoalt'];
				$photolink = $postArray['photolink'];
				if($postArray['photorecid'] == ""){
					$photorecid = 0;
				}else{
					$photorecId = $postArray['photorecid'];
				}
				if(strlen($photoname) < 5){
					Messages::setMsg('Slika mora imati naziv duzi od 5 slova!', 'error');
					return;
				}
				

				$this->query("SELECT photo_link FROM photos WHERE photo_link = '{$photolink}' ");
				$result = $this->resultSet();

				if (count($result) > 0) {

					Messages::setMsg('Slika sa tim nazivom fajla (linkom) već postoji!', 'error');
					return;

				}else{

					$this->query('INSERT INTO photos (photo_title, photo_alt, photo_link, recipe_id) VALUES (:photo_title, :photo_alt, :photo_link, :recipe_id)');
					$this->bind(':photo_title', $photoname);
					$this->bind(':photo_alt', $photoalt);
					$this->bind(':photo_link', $photolink);
					$this->bind(':recipe_id', $photorecId);
					$this->execute();

					$lastId = $this->lastInsertId();


					Messages::setMsg('Uspešno ubačena nova slika! <br>Id poslednje slike u bazi sada je: '. $lastId, 'success');
				} // kraj upisa
			}else{
				Messages::setMsg('Sva polja osim Id recepta moraju biti popunjena!', 'error');
			}
		} // kraj submit

		return;
	} // kraj insert
}




?>
