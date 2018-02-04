<?php 
$recipemodel = new recipeModel();
$id = $recipemodel->getid();
if(($_GET['id']) == NULL){
	header('Location: ' . ROOT_URL); //preusmeravanje na pocetnu ako nema trazenog recepta
}
$recipe = $viewmodel[0];  //ceo recept ali samo iz tabele recepti
$categoriesAll = $viewmodel[1];  //sve kategorije kojima pripada ovaj recept, iz tabele kategorije
$ingrsMainArray = $viewmodel[2];  //svi sastojci iz tabela sastojci i jedinice mere
$commentsAll = $viewmodel[3];  //svi komentari koji su odobreni a pripadaju ovom receptu
$photosAll = $viewmodel[4];  //sve fotke koje pripadaju ovom receptu

$nrPhotos = count($photosAll);

?>

<!-- POCETAK STRANE -->
<div class="main">
    <div class="container bestRecipes">
          <br>
              <div class="col"><hr></div>
              <div class="col"><h1 class="text-center"><?php echo $recipe['recipe_title'] ?></h1></div>
              <div class="col"><hr></div>
          <br>
    </div>

<!-- Carousel -->
 <section id="carousel">
    <div class="row">
    	<div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
    	      <div id="carouselRecipe" class="carousel slide" data-ride="carousel">
	            <ol class="carousel-indicators">
    
		        <?php 
			for ($i = 0; $i < $nrPhotos; $i++) {
				if ($i == 0) {
				     echo '<li data-target="#carouselRecipe" data-slide-to="0" class="active"></li>';
				}else{
				      echo '<li data-target="#carouselRecipe" data-slide-to=" '. $i .' "></li>';
				}	
			}
		        ?>
	             </ol>

	  <div class="carousel-inner">
		<?php 

		for ($i = 0; $i < $nrPhotos; $i++) {
			if($i == 0){
				echo '<div class="carousel-item active"><img class="d-block w-100" src=" ' . ROOT_URL. 'assets/img/'. $photosAll[$i]['photo_link'] . ' " alt="'. $photosAll[$i]['photo_alt'] .'"></div>';
			}else{
				echo '<div class="carousel-item"><img class="d-block w-100" src=" ' . ROOT_URL. 'assets/img/'. $photosAll[$i]['photo_link'] . ' " alt="'. $photosAll[$i]['photo_alt'] .'"></div>';
			}
		}
		?>

	  </div>
	  <a class="carousel-control-prev" href="#carouselRecipe" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Prethodna</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselRecipe" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Sledeća</span>
	  </a>
	</div>
         </div>
    </div>	
 </section><!-- kraj carousel -->   	



    </div>
</div><!-- KRAJ STRANE -->
