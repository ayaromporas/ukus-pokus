<?php
 $recipemodel = new RecipeModel();
 $queryInstance = new Query();

 $recipemodel->comments();

//upit za jedinice mere
$units = $queryInstance->allRows("units","");

//povlacenje get parametra
$id = $recipemodel->getid();

//upit za jedan recept
$query = "recipe_id=$id";
$receptPrikaz = $queryInstance->singleRow("recipes",$query);

//promenljive koje sluze za prikazivanje trazenog recepta
$recipeId = $receptPrikaz['recipe_id'];
$recipeTitle = $receptPrikaz['recipe_title'];
$recipeDesc = $receptPrikaz['description'];
$recipePrep = $receptPrikaz['prep_time'];
$recipeDishes = $receptPrikaz['dirty_dishes'];
$recipeInst = $receptPrikaz['instructions'];
$recipeTime = $receptPrikaz['posting_time'];
$recipeStatus = $receptPrikaz['status'];
$recipeCats = $receptPrikaz['recipe_cats'];
$recipeCats = rtrim($recipeCats,",");
$recipeCats = ltrim($recipeCats, ",");
$recipeIngrs = $receptPrikaz['recipe_ingrs'];
$recipePhotos = $receptPrikaz['recipe_photos'];


//upit za rejting trazenog recepta
$query = "recipe_id = " . $recipeId;
$recipeRejting = $queryInstance->singleRow("ratings",$query);

if(($recipeStatus == 0) OR ($id == "")){
	header('Location: ' . ROOT_URL);
}else{	

//upit za slike
$slike = array();
$slike = explode(",", $recipePhotos);
 $query = ' AND (';
 
foreach ($slike as $item) {
	$query .=  " photo_id=" . $item . " OR ";
}
$query = rtrim($query, "OR ");
$query = $query . ")";
$selector = "cat_id,cat_name";
$fotkeAll = $queryInstance->allRows("*","photos",$query);
$counter = count($fotkeAll);

//upit za kategorije
$kategorije = array();
$kategorije = explode(",", $recipeCats);
$query = 'AND (';
foreach ($kategorije as $key) {
	$query .= "cat_id=" . $key . " OR ";
}
$query = rtrim($query, "OR ");
$query = $query . ")";
$catAll = $queryInstance->allRows("*","categories", $query);

//upit za dobavljanje sastojaka
$sastojci = array();
//razbijanje po slash-u
$sastojci = explode("/", $recipeIngrs);
echo "<br>";

//upit za komentare
$query = " AND (recipe_id=$recipeId) ORDER BY comment_time DESC";
$commentsAll = $queryInstance->allRows("comments",$query);
?>

<!-- POCETAK STRANE -->
<div class="container-fluid main">

	  <div class="row"><!-- Naslov -->
	    <div class="col-12 text-center brown">
	      <br><br>
	      <h2 ><?php  echo $recipeTitle;   ?></h2><br>
	    </div>

	  </div><!-- kraj naslov-->

	  <div class="row"> <!-- karusel-->
	      <div class="col-8 offset-2 text-center">
		     <!-- Carousel start-->
		     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0"  class="active"></li>

			  	<?php
			  	for ($i=1; $i < $counter; $i++) { 
			  	    echo '<li data-target="#carouselExampleIndicators" data-slide-to="$i" ></li>';
			  	}
			  	?>
		             </ol>

    			     <div class="carousel-inner">

		     	         <div class="carousel-item active">		  
		      		<img class="d-block w-100" src="<?php echo ROOT_URL; ?>assets/images/<?php echo $fotkeAll[0]['photo_link']?>" alt="<?php echo $fotkeAll[0]['photo_alt']?>">
		      	        </div>

		  	        <?php
		  	             for ($i=1; $i < $counter; $i++) { 
		  	             echo '<div class="carousel-item">';
		  	             echo '<img class="d-block w-100" src=" '. ROOT_URL . '/assets/images/' . $fotkeAll[$i]['photo_link'] . ' " alt="' . $fotkeAll[$i]['photo_alt'] . '"></div>';	  	   
		  	             }
		  	        ?>
		                  </div> <!-- kraj karusel inner -->

			     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Prethodna</span></a>

			     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Sledeća</span></a>

		     </div><!--Carousel end -->
		     <br>
	       </div>
              </div><!-- kraj karusel-->

	<div class="row"><!-- ispis kategorija, vreme, opis, rejting -->
	     <div class="col-8 offset-2">
		<small><!-- <strong>Nalazi se u kategorijama: </strong> -->
		<?php foreach ($catAll as $key) {
			$catId= mb_strtolower($key['cat_id']." ".$key['cat_name'], 'UTF-8');
          	$catId = str_replace(" ", "-", $catId);
          	$catId = $queryInstance->convertExtendedToNormal($catId);
			// $catId = $key['cat_id'];
			echo "<a class='btn btn-success btn-sm cats' href=' ". ROOT_URL ."category/$catId'>" . $key['cat_name'] . " </a>&nbsp;&nbsp;";
		}?>
	 	</small><br> <br>
	 	<p><!-- <strong>Rejting: <?php echo $recipeRejting['rating_name']; ?>  </strong>(156 glasova) &nbsp; -->
	 		<img src="<?php echo ROOT_URL; ?>/assets/images/zv-pu.png" alt="rating" class='small-img'>
	 		<img src="<?php echo ROOT_URL; ?>/assets/images/zv-pu.png" alt="rating" class='small-img'>
	 		<img src="<?php echo ROOT_URL; ?>/assets/images/zv-pu.png" alt="rating" class='small-img'>
	 		<img src="<?php echo ROOT_URL; ?>/assets/images/zv-pu.png" alt="rating" class='small-img'>
	 		<img src="<?php echo ROOT_URL; ?>/assets/images/zv-po.png" alt="rating" class='small-img'>&nbsp; (156 glasova)&nbsp;&nbsp;&nbsp;
	 		<img src="<?php echo ROOT_URL; ?>/assets/images/sat.png" alt="sat" class='small-img'>&nbsp;&nbsp;<?php echo $recipePrep; ?>&nbsp; min&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="<?php echo ROOT_URL; ?>/assets/images/posuda.png" alt="posuda" class='small-img'>&nbsp;&nbsp;<?php echo $recipeDishes; ?>&nbsp;kom
		</p>

		<!-- opis-->
		<p class="desc"><?php echo $recipeDesc; ?> </p>
		
	     </div>
	</div><!-- kraj opisa i ispisa vremena i rejtinga -->

<div class="sveska"><!-- dizajn sveske -->
	<br><br>
	<!-- Ispis liste sastojaka -->
	<div class="row">
		<div class="col-6 offset-1 green">
			<h4><u>Sastojci: </u></h4>
		</div>	
	</div>
	<div class="row">
		<div class="col-5 offset-1">
			<?php 
			//upit za dobavljanje sastojaka
			$sastojci = array();
			//razbijanje po slash-u
			$sastojci = explode("/", $recipeIngrs);

			echo "<div>";
			//ispis liste sastojaka
			echo '<table class="table  sastojci table-sm"><tbody>';
			foreach ($sastojci as $set) {
				$niz = $set;			
				echo "<tr>";

				//razbijanje po zarezu
				$particles = array();
				$particles = explode(",", $niz);

				//ispis liste sastojaka i njihovih kolicina i jedinica mere
				echo "<td  class='ingrlist upper' >";
				$ingrId = $particles[0]; 
				$query = " ingredient_id=$ingrId";
				
				$ingAll = $queryInstance->singleRow("ingredients",$query);
				echo $ingAll['ingredient_name'];  
				echo "</td>";
				
				echo "<td class='ingrlist' style='width: 60px;'>";
				$ammount = $particles[1]; 
				echo "<strong>" . $ammount ."</strong>";
				echo "</td>";
				
				$unitId = $particles[2]; 
				echo "<td  class='ingrlist' style='width: 120px;'>";
				//upit za naziv jedinice mere
				foreach ($units as $measure) {
					$row = $measure;
					//echo $red['unit_id'];
					if ($row['unit_id'] == $unitId) {
						echo "<strong>" . $row['unit_name'] ."</strong>";
					}
				}
				echo "</td>";
				echo "</tr>";		
			}
			echo "</tbody></table>";
			echo "</div>";
			?> 
			<br><br>
		</div>
	</div><!-- Kraj liste sastojaka -->

	<!-- Ispis uputstva za pripremu -->
	<div class="row">
		<div class="col-6 offset-1 green">
			<h4><u>Uputstvo za pripremu: </u></h4>
		</div>			
	</div>
	<div class="row">
		<div class="col-8 offset-1">			
			<p><?php echo $recipeInst; ?> </p>
		</div>
	</div><!-- kraj uputstva za pripremu -->
</div><!-- kraj diva sveska -->
	<!-- prijatno -->
	<div class="row">
		<div class="col-12 text-center">
			<h4>Prijatno! </h4><br><br><br>
		</div>	
	</div>

	<!-- kategorije ponovo-->
	<div class="row">
		<div class="col-8 offset-2">
			<div class="col-12 text-center">
			<strong >Potražite i druge recepte u kategorijama: </strong> </div><br>
			<div class="col-12 text-center">
			<?php foreach ($catAll as $key) {
				$catId= mb_strtolower($key['cat_id']." ".$key['cat_name'], 'UTF-8');
          		$catId = str_replace(" ", "-", $catId);
          		$catId = $queryInstance->convertExtendedToNormal($catId);
				// $catId = $key['cat_id'];
				echo "<a class='btn btn-success btn-sm cats' href=' ". ROOT_URL ."category/$catId'>" . $key['cat_name'] . " </a>&nbsp;&nbsp;";
			}?></div> <br> <br>
			
		</div>
	</div> <!-- kategorije kraj -->
	

	<!-- naslov komentari -->
	<div class="row">
		<div class="col-12 text-center">
			<br><br><br><h3>Komentari</h3>
		</div>	
	</div>

	<!-- komentarisanje -->
	<div class="row">
		<div class="col-8 offset-2"><br>
			<p> Ispričajte nam kako je vama ispalo, da li ste nešto dodali ili drugačije uradili? <br>
			Ideje za posluživanje i serviranje? Sa čim ste kombinovali?</p><br>
			<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">

				<input type="hidden" name="recipeid" value="<?php echo $recipeId; ?>">

				 <div class="form-group">
				 <label for="exampleInputIme1">Vaše ime</label>
				 <input type="text" class="form-control" name="ime" placeholder="Vaše ime" required>
				  </div>	

				  <div class="form-group">
				    <label for="exampleInputEmail1">Vaša email adresa</label>
				    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Unesite email" name="email" required>
				    <small id="emailHelp" class="form-text text-muted">Nikada nećemo proslediti vaš email bilo kome, niti ga zloupotrebiti na drugi način.</small>
				  </div>

				  <div class="form-group">
				 <label for="exampleInputText1">Vaš komentar</label>
				 <textarea class="form-control" rows="3" placeholder="Unesite svoj komentar..." name="komentar" required></textarea>
				
				  </div>	

				  <div class="text-right">
				         <button type="submit" class="btn btn-success" name="submit" value="submit">Pošalji</button>
				  </div>
				
			</form>
		</div>
	</div><!-- kraj komentarisanja -->
	<br><br>

	<!-- ispis postojećih komentara -->
	<div class="row">
		<div class="col-8 offset-2">
			<?php
			foreach ($commentsAll as $item) {	
				$time = $item['comment_time'];
				$date = date_create($time);				
				$day = date_format($date, "d.m.Y");
				$comment = $item['comment_text'];
				$name = $item['comment_name'];
			
			?>
				<div class="card">
				  <div class="card-body">
				    <h4 class="card-title"><?php echo $name; ?></h4>
				    <h6 class="card-subtitle mb-2 text-muted"><?php echo $day; ?></h6>
				    <p class="card-text"><?php echo $comment; ?></p>
				  </div>
				</div><br><br>
			<?php
			}
			?>
		</div>
	</div><!-- kraj ispisa postojecih komentara -->

</div><!-- kraj main -->

<!-- KRAJ STRANE -->

<?php
}
?>








