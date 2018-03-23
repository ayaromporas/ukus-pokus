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


	if(!(empty($_FILES))){

$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(($postArray['photoname'] && $postArray['photoalt'] && $postArray['photolink'])  != "") {

	// dodela promeljivih unosima iz inputa
	$photoname = $postArray['photoname'];
	$photoalt = $postArray['photoalt'];
	$photolink = $postArray['photolink'];

	// provera unosa id recepta
	if($postArray['photorecid'] == ""){
		$photorecId = 0;
	}else{
		$photorecId = $postArray['photorecid'];
	}

	// provera unosa naziva slike
	if(strlen($photoname) < 5){
		Messages::setMsg('Slika mora imati naziv duzi od 5 slova!', 'error');
		return;
	}

	// provera da li fajl sa unetim linkom postoji
	$this->query("SELECT photo_link FROM photos WHERE photo_link = '{$photolink}' ");

	$result = $this->resultSet();

	if (count($result) > 0) {

		Messages::setMsg('Slika sa tim nazivom fajla (linkom) već postoji u bazi!', 'error');
		return;

	}else{

		/*--------upload i provere slike i upis u bazu --------*/

		// upload slike ako je sve dovde ok
		$target_dir ="c://wamp64/www/kibo/ukus-pokus/assets/img/"; 
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$target_file = $target_dir . $photolink;
		$uploadOk = 1;  // postavljanje promenljive na 1
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if file is an image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		          $uploadOk = 0;
		        Messages::setMsg('Niste izabrali sliku!', 'error');
		         return;
		    }

		 // Check if file already exists
		if (file_exists($target_file)) {

		    $uploadOk = 0;
		    Messages::setMsg('Slika sa tim nazivom fajla već postoji u folderu za slike!', 'error');
			return;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		    $uploadOk = 0;
		    Messages::setMsg('Samo JPG, JPEG i PNG slike su dozvoljene!', 'error');
		    return;
		}

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
		    $uploadOk = 0;
		    Messages::setMsg('Slika ne sme biti veća od 5MB!', 'error');
		    return;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    Messages::setMsg('Izvinite, došlo je do greške prilikom uploada slike!', 'error');
		    return;


		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";


			$this->query('INSERT INTO photos (photo_title, photo_alt, photo_link, recipe_id) VALUES (:photo_title, :photo_alt, :photo_link, :recipe_id)');
			$this->bind(':photo_title', $photoname);
			$this->bind(':photo_alt', $photoalt);
			$this->bind(':photo_link', $photolink);
			$this->bind(':recipe_id', $photorecId);
			$this->execute();
			$lastId = $this->lastInsertId();

			Messages::setMsg('Uspešno ubačena nova slika! <br>Id poslednje slike u bazi sada je: '. $lastId, 'success');


		    } else {
		       	Messages::setMsg('Izvinite, došlo je do greške prilikom uploada slike!', 'error');
		             return;
		    }
		}


	} // kraj else ako nema tave slike u bazi



} //  ako input polja nisu pazna
else{
	Messages::setMsg('Sva polja osim Id recepta moraju biti popunjena!', 'error');
	return;
} // kraj else


} // ako files nije prazan
else {    // ako nije izabrana slika
             $uploadOk = 0;
             Messages::setMsg('Morate izabrati neku sliku za upload!', 'error');
             return;
} // kraj else


} // ako je submit
return;

} // kraj inserta



} // kraj modela





?>
