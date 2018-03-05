<?php
class DashboardModel extends Model{
	public function Index(){



		if(isset($_POST['insert']) && isset($_POST['secure'])){

			if (count($_POST) == 2) {


				$titlesArray = array();
				$title1 = "Pogačice sa čvarcima i belim lukom";
				$title2 = "Zeleni smoothie sa đumbirom, krastavcem i limunom";
				$title3 = "Pačiji batak u sosu od malina i votke";
				$title4 = "Krofnice sa vanila kremom i šafranom";
				$title5 = "Božićna hrskava pogača";
				$title6 = "Čokoladna gitara torta";
				$title7 = "Vruć kolač od jabuka, urmi i sladoleda";
				$title8 = "Tuna u sosu od medenih tajni";
				$title9 = "Hrono hleb, lako i brzo";
				$title10 = "Paleta sireva sa voćem";
				$titlesArray = array($title1, $title2, $title3, $title4, $title5, $title6, $title7, $title8, $title9, $title10);

				$descArray = array();
				$desc1 = "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.";
				$desc2 = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.";
				$desc3 = "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model.";
				$descArray = array($desc1, $desc2, $desc3);

				$instrArray = array();
				$instr1 = "<strong>Korak 1:</strong><br>U jednoj većoj posudi umutiti sve sastojke zajedno. <br><br><strong>Korak 2:</strong><br>Tiganj srednje veličine podmazati sa vrlo malo ulja, zagrejati na najjačoj temperaturi i manjom kutlačom razlivati palačinkice prečnika oko 15 cm. Čim dobije zlatno braon boju sa jedne strane odmah okretati i pržiti kratko i sa druge strane. <br><br><strong>Korak 3:</strong><br>Filovati slanim ili slatkim nadevima, i služiti tople.";
				$instr2 = "<strong>Korak 1:</strong><br>U jednoj posudi umutiti Prva tri sastojka. <br><br><strong>Korak 2:</strong><br>Poređati sve u veliki pleh i peći na 180 C. Čim dobije zlatno braon boju sa jedne strane odmah okretati i peći kratko i sa druge strane. <br><br><strong>Korak 3:</strong><br>Umutiti u drugu posudu ostale sastojke i preliti preko ispečene osnove. Ohladiti i iseći na kocke. Služiti sa omiljenim kavijarom.";
				$instr3 = "<strong>Korak 1:</strong><br>Pripremite 4 posude, po jednu za svaku boju fila. Umutite sva četiri fila.<br><br><strong>Korak 2:</strong><br>Ispecite pravougaoni patišpan od jaja, brašna i oraha, i namažite ga omiljenim džemom. <br><br><strong>Korak 3:</strong><br>Isecite patišpan na 4 dela i namažite svaki deo po jednom bojom fila. Premazati šlagom i postaviti figuricu mašne na vrh torte. Odlično se slaže sa šampanjcem.";
				$instrArray = array($instr1, $instr2, $instr3);

				$catsArray = array();
				$cats1 = ",1,2,3,4,";
				$cats2 = ",5,6,7,8,9,";
				$cats3 = ",10,11,12,13,14,";
				$cats4 = ",15,16,17,18,";
				$cats5 = ",19,20,21,";
				$catsArray = array($cats1, $cats2, $cats3, $cats4, $cats5);

				$ingrArray = array();
				$ingr1 = "1,5,9/2,5,9/6,5,12/5,6,8";
				$ingr2 = "1,3,2/3,5,9/4,5,5/9,5,6/6,5,6";
				$ingr3 = "4,50,1/8,95,5/6,600,3/1,200,5/23,60,17";
				$ingr4 = "2,3,11/3,80,5/7,6,11";
				$ingr5 = "3,5,11/7,5,9/9,5,12/21,65,11";
				$ingr6 = "2,5,9/5,7,8/9,5,6";
				$ingrArray = array($ingr1, $ingr2, $ingr3, $ingr4, $ingr5, $ingr6);

				$ingidArray = array();
				$ing1 = ",1,2,6,5,";
				$ing2 = ",1,3,4,9,6,";
				$ing3 = ",4,8,6,1,23,";
				$ing4 = ",2,3,7,";
				$ing5 = ",3,7,9,21,";
				$ing6 = ",2,5,9,";
				$ingidArray = array($ing1, $ing2, $ing3, $ing4, $ing5, $ing6);

				$photosArray = array();
				$photo1 = "50, 49,48,47";
				$photo2 = "46,45,44,43,42";
				$photo3 = "41,40,39,38";
				$photo4 = "37,36,35";
				$photo5 = "34,33,32,31";
				$photo6 = "30,29,28,27,26,25";
				$photo7 = "24,23,22,21,20";
				$photo8 = "19,18,17,16,15";
				$photo9 = "14,13,12";
				$photo10 = "11,10,9";
				$photosArray = array($photo1, $photo2, $photo3, $photo4, $photo5, $photo6, $photo7, $photo8, $photo9, $photo10);

				$linksArray = array();
				$link1 = "krofnice-sa-vanila-kremom";
				$link2 = "pogacice-sa-cvarcima";
				$link3 = "cokoladna-gitara-torta";
				$link4 = "tuna-u-sosu-od-meda";
				$linksArray = array($link1, $link2, $link3, $link4);




				for ($i = 0; $i < 10000; $i++) {

					$recipetitle = $titlesArray[mt_rand(0,9)];
					$description = $descArray[mt_rand(0,2)];
					$preptime = mt_rand(5,300);
					$dirtydishes = mt_rand(1,5);
					$instructions = $instrArray[mt_rand(0,2)];
					$recipecats = $catsArray[mt_rand(0,4)];
					$recipeingrs = $ingrArray[mt_rand(0,5)];
					$recipeingrsid = $ingidArray[mt_rand(0,5)];
					$recipephotos = $photosArray[mt_rand(0,9)];
					$userid = mt_rand(1,7);
					$avgrating = mt_rand(1,5);
					$novotes = mt_rand(10,90);
					$permalink = $linksArray[mt_rand(0,3)];

					$this->query('INSERT INTO recipes (recipe_title, description, prep_time, dirty_dishes, instructions, recipe_cats, recipe_ingrs, recipe_ingrs_id, recipe_photos, user_id, avg_rating, no_votes, recipe_permalink) VALUES (:recipe_title, :description, :prep_time, :dirty_dishes, :instructions, :recipe_cats, :recipe_ingrs, :recipe_ingrs_id, :recipe_photos, :user_id, :avg_rating, :no_votes, :recipe_permalink)');
					$this->bind(':recipe_title' ,$recipetitle);
					$this->bind(':description' ,$description);
					$this->bind(':prep_time' ,$preptime);
					$this->bind(':dirty_dishes' ,$dirtydishes);
					$this->bind(':instructions' ,$instructions);
					$this->bind(':recipe_cats' ,$recipecats);
					$this->bind(':recipe_ingrs' ,$recipeingrs);
					$this->bind(':recipe_ingrs_id' ,$recipeingrsid);
					$this->bind(':recipe_photos' ,$recipephotos);
					$this->bind(':user_id' ,$userid);
					$this->bind(':avg_rating' ,$avgrating);
					$this->bind(':no_votes' ,$novotes);
					$this->bind(':recipe_permalink' ,$permalink);
					$this->execute();

					$lastId = $this->lastInsertId();
					//echo $lastId;

				}

				Messages::setMsg('Uspešno ubačeno 10000 novih recepata! <br>Id poslednjeg recepta u bazi sada je: '. $lastId, 'success');
			}
			return;

		}/* kraj submita */

	}/*kraj index */
} /* kraj klasa */
