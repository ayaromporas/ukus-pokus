<?php
/* javlja se na recipe stranici */
include ('../config.php');
include ('../classes/Database.php');
include ('../classes/Model.php');
include ('../models/RecipeModel.php');
$database = new Database();
$recipemodel = new RecipeModel();
$errors = array();

if(isset($_POST['id']) ){    //ako nema recepta sa trazenim id-jem u bazi, vracanje na pocetnu
	$id = $_POST['id'];
	$idRecipe = sanitize($id);
	//echo $idRecipe;
	$recipemodel->query('SELECT recipe_id FROM recipes WHERE status=1 AND recipe_id=' . $idRecipe);
	$recipeId = $recipemodel->single();
	$ID = intval($recipeId['recipe_id']);
	if (!($recipeId)) {						
		$id = false;						//ako nema takvog id recepta u bazi
		header('Location: ' . ROOT_URL); //resitiiii!!!!!!!
	}else{	
		$id = true;						//ako je takav id pronadjen u bazi
									
		if(isset($_POST['name']) ){				//ispitivanje imena korisnika
			$name = $_POST['name'];
			$nameUser = sanitize($name);
			$x = strlen($nameUser);
			
			if($x > 50){
				$errorName = "Ime je ograničeno na 50 karaktera";
				$nameUser = "";
				array_push($errors, $errorName);
			}elseif($x < 3){
				$errorName = "Ime mora imati 3 i više slova";
				$nameUser = "";
				array_push($errors, $errorName);
			}elseif ($x == 0) {
				$errorName = "Polje za ime je obavezno";
				$nameUser = "";
				array_push($errors, $errorName);
			}else{
				//echo $nameUser;
				//echo 'idemo sa upisom u bazu name';
				$name = true;
			}
			//echo "Promenljiva name: ";
			//var_dump($nameUser);			
		}

		if(isset($_POST['email']) ){ 				//ispitivanje emaila korisnika
			$email = $_POST['email'];
			$emailUser = sanitize($email);
			$y = strlen($emailUser);

			$emailClean = filter_var($emailUser, FILTER_SANITIZE_EMAIL);

			if($y > 50){
				$errorEmail = "Email je ograničen na 50 karaktera";
				$emailClean = "";
				array_push($errors, $errorEmail);
			}elseif ($y == 0) {
				$errorEmail = "Polje za email je obavezno";
				$emailClean = "";
				array_push($errors, $errorEmail);
			}else{
				//echo $emailClean;
				//echo 'idemo sa upisom u bazu email';
				$email = true;
			}
			// echo "Promenljiva email: ";
			// var_dump($emailUser);			
		}

		if(isset($_POST['comment']) ){ 				//ispitivanje komentara korisnika
			$comment = $_POST['comment'];
			$commentUser = sanitize($comment);
			$z = strlen($commentUser);

			if($z > 3000){
				$errorComment = "Za komentar je predviđeno maksimalno 3000 karaktera";
				$commentUser = "";
				array_push($errors, $errorComment);
			}elseif ($z == 0) {
				$errorComment = "Polje za komentar je obavezno";
				$commentUser = "";
				array_push($errors, $errorComment);
			}
			else{
				//echo $commentUser;
				//echo 'idemo sa upisom u bazu comment';
				$comment = true;
			}		
		}

		if(isset($_POST['hidden']) ){
			$hidden = $_POST['hidden'];
			$honeypot = sanitize($hidden);
			
			If(!(empty($honeypot))){                                //ispitivanje skrivenog polja
				$errorHidden = "Maybe our hidden field is not so hidden, but neither are your intentions. ";
				$honeypot = "";
				array_push($errors, $errorHidden);
			}else{
				//echo 'idemo sa upisom u bazu polje hidden ok';
				$hidden = true;
			}		
		}

		if (($id === true) && ($name === true) && ($email === true) && ($comment ===true) && ($hidden === true)){  // ako je sve ok ide upis u bazu i potvrda uspesnog komentara
			
			// print_r($errors);
			// echo 'Upis!!!!';
			// var_dump($ID);
			// var_dump($id) ;
			// var_dump($name); echo $nameUser;
			// var_dump($email); echo $emailClean;
			// var_dump($comment); echo $commentUser;
			// var_dump($hidden); var_dump($honeypot);

			//UPIS KOMENTARA U BAZU
			$recipemodel->query('INSERT INTO comments (comment_name,comment_email,comment_text,recipe_id) VALUES (:comment_name,:comment_email,:comment_text,:recipe_id)');
			$recipemodel->bind(':comment_name', $nameUser);
			$recipemodel->bind(':comment_email', $emailClean);
			$recipemodel->bind(':comment_text', $commentUser);
			$recipemodel->bind(':recipe_id', $ID);

			$recipemodel->execute();

			?>
			<div class="alert alert-success mx-2" role="alert">
			  <h5 class="alert-heading">Vaš komentar je uspešno poslat!</h5>
			  <p>Biće objavljen čim ga odobri administrator.</p>
			  <p class="mb-0">U međuvremenu, nadamo se da ćete isprobati još neki naš recept i javiti nam kako vam se čini. </p>
			</div>
			<?php

		}else{   //ispis gresaka i neuspesnog komentara
			?>
			<div class="alert alert-danger mx-2" role="alert">
			    <h5 class="alert-heading">Vaš komentar nije uspešno poslat!</h5><br>
				 <?php
				       foreach ($errors as $error) {
					echo '<p>'. $error .'</p>';
				      }
			 	?>
			    <p class="mb-0">Osvežite stranicu i pokušajte ponovo.</p>
			</div>
			<?php
			print_r($errors);
		}
	}	
} // kraj glavni if id isset




function sanitize($string){     //proveriti sa nekim oko sanitacije ulaznih stringova za user input comment
	$a = trim($string);
	$b = htmlspecialchars($a);
	$c = htmlentities($b);
	//$c .= "sanitize";
	return $c;
}

$regexName = "^[a-zA-Z šŠćĆčČđĐžŽ_-]{3,50}$^";
 ?>