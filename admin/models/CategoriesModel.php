<?php
class CategoriesModel extends Model{

	public function Index(){

		$this->query('SELECT * FROM categories ORDER BY cat_name ASC');
		$categories = $this->resultSet();

		$resultArray = array($categories);

		return $resultArray;

	}

	public function Insert(){

		if(isset($_POST['submit'])){

			$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			if (($postArray['catname'] && $postArray['catpermalink'] && $postArray['catphoto'] && $postArray['catdescription'] ) != "" ){
				
			
				$catname = $postArray['catname'];
				$catpermalink = $postArray['catpermalink'];
				$catphoto = $postArray['catphoto'];
				$catdescription = $postArray['catdescription'];

				$this->query("SELECT cat_name FROM categories WHERE cat_name = '{$catname}' ");
				$result = $this->resultSet();

				if (count($result) > 0) {

					Messages::setMsg('Takva kategorija već postoji!', 'error');
					return;

				}else{

					$this->query('INSERT INTO categories (cat_name, cat_permalink, cat_photo, cat_description) VALUES (:cat_name, :cat_permalink, :cat_photo, :cat_description)');
					$this->bind(':cat_name', $catname);
					$this->bind(':cat_permalink', $catpermalink);
					$this->bind(':cat_photo', $catphoto);
					$this->bind(':cat_description', $catdescription);
					$this->execute();

					$lastId = $this->lastInsertId();


					Messages::setMsg('Uspešno ubačena nova kategorija! <br>Id poslednje kategorije u bazi sada je: '. $lastId, 'success');
				}
			}else{
				Messages::setMsg('Sva polja moraju biti popunjena', 'error');
			}
		}

		return;

	}


}
