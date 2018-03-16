<?php
/* javlja se na stranici kategorija, ispisuje sve recepte koji joj pripadaju */

include ('../config.php');
include ('../classes/Database.php');
include ('../classes/Model.php');
include ('../models/CategoryModel.php');
$database = new Database();
$categorymodel = new CategoryModel();
$errors = array();  //napisati kod koji obavestava korisnika da je neka greska na serveru

$limit = 12;
$page = 1;
$query = "";

//echo 'test';
if(isset($_POST['page']) ){
	$page = $_POST['page'];
	//  echo "Promenljiva page: ";
	// var_dump($page);
}

if(isset($_POST['id']) ){    
	$id = $_POST['id'];
	$ID = sanitize($id);
	// echo $ID;
	$categorymodel->query("SELECT * FROM categories WHERE status=1 AND cat_id = $ID");
	$category = $categorymodel->single();
	//print_r($category);

	$query = "'%". $ID ."%'";
	$categorymodel->query("SELECT recipe_id, recipe_title, prep_time, dirty_dishes, recipe_photos, avg_rating, no_votes, recipe_permalink FROM recipes WHERE status=1 AND recipe_cats like $query");
	$recipeResults = $categorymodel->resultSet();
	$numberRecipes = count($recipeResults);
	//print_r($recipeResults);
	//echo $numberRecipes;


 
if ($numberRecipes > 0) {
?>

 	<div class="row">
                <?php
                     	
                  // Ispis pronadjenih recepata petljom
                     $x = ($page-1) * $limit;
                     $y = $x + $limit;

                      while ($x < $y){ 

                	  if (!($x > ($numberRecipes-1))) {

                	$recipe = $recipeResults[$x];		  
                	$photos = $recipe['recipe_photos'];
                	$photoArray = explode(",", $photos);
                	$photoId = $photoArray[0];
                	$categorymodel->query("SELECT photo_alt, photo_link FROM photos WHERE status=1 AND photo_id=$photoId");
                	$photoSingle = $categorymodel->single();
                	$recipeRating = $recipe['avg_rating']. ""; 
                	$nFullStars = $recipeRating[0]; 
                	$halfOrEmptyStar = $recipeRating[2];                 	

               ?> 
                       
                      <div class="col-md-3">
                        <div class="card  card-recipes">
                          <div class="double"><a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipe['recipe_id']; ?>/<?php echo $recipe['recipe_permalink']; ?>"><h5 class="card-title text-center"><?php echo $recipe['recipe_title']; ?></h5></a></div>
                          <a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipe['recipe_id']; ?>/<?php echo $recipe['recipe_permalink']; ?>">
                            <img class="card-img-top" src="<?php echo ROOT_URL; ?>assets/img/<?php echo $photoSingle['photo_link']; ?>" alt="<?php echo $photoSingle['photo_alt']; ?>">
                          </a>
 
                          <p>
			<?php

			if ($recipe['avg_rating'] < 5.0) {
				for ($i = 0; $i < $nFullStars; $i++) {
					echo '<img src="' . ROOT_URL . 'assets/img/zv-pu.png" alt="rejting" class="smallImg">';
				}
				if ($halfOrEmptyStar < 5) {
					echo '<img src="' . ROOT_URL . 'assets/img/zv-pr.png" alt="rejting" class="smallImg">';
				}elseif ($halfOrEmptyStar >= 5) {
					echo '<img src="' . ROOT_URL . 'assets/img/zv-po.png" alt="rejting" class="smallImg">';
				}
				for ($i = 0; $i < (4-$nFullStars); $i++) {
					echo '<img src="' . ROOT_URL . 'assets/img/zv-pr.png" alt="rejting" class="smallImg">';
				}

			}elseif ($recipe['avg_rating'] == 5.0) {
				for ($i = 0; $i < 5; $i++) {
					echo '<img src="' . ROOT_URL . 'assets/img/zv-pu.png" alt="rejting" class="smallImg">';
				}
			}
			?>  

                             &nbsp; <?php echo $recipe['avg_rating']; ?> &nbsp; (<?php echo $recipe['no_votes']; ?> &nbsp; glasova)<br>
                           <img src="<?php echo ROOT_URL; ?>assets/img/sat.png" alt="vreme pripreme" class="smallImg"> &nbsp; <?php echo $recipe['prep_time']; ?> &nbsp; min<br>
                           <img src="<?php echo ROOT_URL; ?>assets/img/posuda.png" alt="posuda" class="smallImg"> &nbsp; <?php echo $recipe['dirty_dishes']; ?> &nbsp; kom prljavog posuđa
                         </p>
                        </div>
                       </div>

                <?php 
                } $x++;
            } 

/* -------------------------------------------------------------------------- kraj ispisa recepata ---------------------------------------------------*/
            ?> 


             </div><!--kraj row -->


         <section id="paginationCat">
<br>
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center">

	<?php
 
/*-------------------------------------------------------iscrtavanje paginacije -----------------------------------*/ 
	 if ($numberRecipes > 0){  //iscrtavanje paginacije

		$i = ($numberRecipes/$limit);
		$i = ceil($i);

		if ($i == 1) {				/* prvi slucaj */
			echo '<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';

		}elseif (($i > 1) && ($i < 8)) {
			for ($e = 1; $e < ($i+1); $e++) {
				if ($e == $page) {
					echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
				}else{
					echo '<li class="page-item"><span id="' . $e. '" class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
				       }
			}
 
		}elseif ($i >= 8) {			/*drugi slucaj  */
			if ($page >= 5){
				if ($page > ($i-4)) {
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
					for ($e = ($i-4); $e < ($i+1); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id="' . $e. '" class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
						}
					}
 
				}else{
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>'; 

					for ($e = $page-2; $e < ($page+3); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id="' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
						}
					}

					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
					echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
				}	

			}elseif ($page < 5) {
				for ($e = 1; $e < 6; $e++) {
					if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
					}else{
						echo '<li class="page-item"><span id="' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
					}
				}
				echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
				echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
			}			
		} /* treci slucaj */
	?>
       </ul>
   </nav>
</section>
<br>
	<?php 
	} 
}
       
}



















function sanitize($string){     //proveriti sa nekim oko sanitacije ulaznih stringova za user input comment
	$a = trim($string);
	$b = htmlspecialchars($a);
	$c = htmlentities($b);
	//$c .= "sanitize";
	return $c;

}	


  ?> 