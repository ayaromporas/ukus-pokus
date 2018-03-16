<?php
/* javlja se na home stranici */
include ('../config.php');
include ('../classes/Database.php');
$database = new Database();
$limit = 8;
$page = 1;

if(isset($_POST['page']) ){
	$page = $_POST['page'];
	//echo "Promenljiva page: ";
	//var_dump($page);
}

if(isset($_POST['data']) && is_array($_POST['data'])){
	$data = $_POST['data'];
	// echo "Namirnice: ";
	// print_r($data);
}

if(isset($_POST['cat']) && is_array($_POST['cat'])){
	$cat = $_POST['cat'];
	// echo "Kategorije: ";
	// print_r($cat);
}
 
$query = "";
if(isset($_POST['data']) && is_array($_POST['data'])){
	$query = " (";
	foreach ($data as $row) {
	 $query .= "recipe_ingrs_id like '%" . "," .$row. "," . "%' AND ";
 	}
	$query= rtrim($query, "AND ");
	$query .= ")";

	if(isset($_POST['cat']) && is_array($_POST['cat'])){
		$cat = $_POST['cat'];
		$query .= " AND (";
		foreach ($cat as $row) {
			$query .= "recipe_cats like '%" . "," .$row. "," . "%' AND ";
		}
		$query= rtrim($query, "AND ");
		$query .= ")";
	}

//echo $query; 
$database->query("SELECT recipe_id, recipe_title, prep_time, dirty_dishes, recipe_photos, avg_rating, no_votes, recipe_permalink  FROM recipes WHERE (status=1) AND $query" );
$recipeResults = $database->resultSet();
$numberRecipes = count($recipeResults);

//print_r($recipeResults);
?>

<section id="recipesResults">      
     <div class="bestRecipes">
          <div class="container">
	<br>
	  <div class="col"><hr></div>
	  <div class="col"><h2 class='display-5 text-center'>Ukupno ima <span> <?php echo $numberRecipes; ?></span> recepata koji ispunjavaju zadate kriterijume </h2></div>
	  <div class="col"><hr></div>
	<br>

	 <div class="row">
                <?php  //ispis recepata na upit namirnica (i kategorija sa dodatnim if)

                $x = ($page-1) * $limit;
                     $y = $x + $limit;

                      while ($x < $y){ 
                	  if (!($x > ($numberRecipes-1))) {
                	  	
                	  
                	$recipe = $recipeResults[$x];
		$photos = $recipe['recipe_photos'];
                	$photoArray = explode(",", $photos);
                	$photoId = $photoArray[0];
                	$database->query("SELECT photo_alt, photo_link FROM photos WHERE status=1 AND photo_id=$photoId");
                	$photoSingle = $database->single();
                	$recipeRating = $recipe['avg_rating']. ""; 
                	$nFullStars = $recipeRating[0]; 
                	$halfOrEmptyStar = $recipeRating[2]; 

               ?>
                       
                      <div class="col-md-3">
                        <div class="card card-recipes">
                          <div class="double"><a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipe['recipe_id']; ?>/<?php echo $recipe['recipe_permalink']; ?>"><h5 class="card-title text-center"><?php echo $recipe['recipe_title']; ?></h5></a></div>
                          <a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipe['recipe_id']; ?>/<?php echo $recipe['recipe_permalink']; ?>">
                            <img class="card-img-top" src="assets/img/<?php echo $photoSingle['photo_link']; ?>" alt="<?php echo $photoSingle['photo_alt']; ?>">
                          </a>
 
                          <p>
<?php

if ($recipe['avg_rating'] < 5.0) {
	for ($i = 0; $i < $nFullStars; $i++) {
		echo '<img src="assets/img/zv-pu.png" alt="rejting" class="smallImg">';
	}
	if ($halfOrEmptyStar < 5) {
		echo '<img src="assets/img/zv-pr.png" alt="rejting" class="smallImg">';
	}elseif ($halfOrEmptyStar >= 5) {
		echo '<img src="assets/img/zv-po.png" alt="rejting" class="smallImg">';
	}
	for ($i = 0; $i < (4-$nFullStars); $i++) {
		echo '<img src="assets/img/zv-pr.png" alt="rejting" class="smallImg">';
	}

}elseif ($recipe['avg_rating'] == 5.0) {
	for ($i = 0; $i < 5; $i++) {
		echo '<img src="assets/img/zv-pu.png" alt="rejting" class="smallImg">';
	}
}
?> 
                             &nbsp; <?php echo $recipe['avg_rating']; ?> &nbsp; (<?php echo $recipe['no_votes']; ?> &nbsp; glasova)<br>
                           <img src="assets/img/sat.png" alt="vreme pripreme" class="smallImg"> &nbsp; <?php echo $recipe['prep_time']; ?> &nbsp; min<br>
                           <img src="assets/img/posuda.png" alt="posuda" class="smallImg"> &nbsp; <?php echo $recipe['dirty_dishes']; ?> &nbsp; kom prljavog posuđa
                         </p>
                        </div>
                       </div>

                <?php 
                } $x++;
                
            } ?> <!-- Kraj ispisa pronadjenih recepata petljom -->

             </div><!--kraj row -->
          </div>
      </div>
</section> <!-- kraj rezultati pretrage -->

<section id="paginationHome">
	<br>
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center">

	<?php if ($numberRecipes > 0){  //iscrtavanje paginacije

		$i = ($numberRecipes/$limit);
		$i = ceil($i);
 
		if ($i == 1) {
			echo '<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';

		}elseif (($i > 1) && ($i < 8)) {
			for ($e = 1; $e < ($i+1); $e++) {
				if ($e == $page) {
					echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
				}else{
					echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
				       }
			}

		}elseif ($i >= 8) {
			if ($page >= 5){
				if ($page > ($i-4)) {
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
					for ($e = ($i-4); $e < ($i+1); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
						}
					}

				}else{
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>'; 

					for ($e = $page-2; $e < ($page+3); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
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
						echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
					}
				}
				echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
				echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
			}
		}
	?>

       </ul>
   </nav>
</section>

<?php } ?>

<?php

}else{
	if(isset($_POST['cat']) && is_array($_POST['cat'])){
		$cat = $_POST['cat'];
		$query =  "(";
		foreach ($cat as $row) {
			$query .= "recipe_cats like '%" . "," .$row. "," . "%' AND ";
		}
		$query= rtrim($query, "AND ");
		$query .= ")";
	}
	//echo $query;
	$database->query("SELECT recipe_id, recipe_title, prep_time, dirty_dishes, recipe_photos, avg_rating, no_votes, recipe_permalink  FROM recipes WHERE (status=1) AND $query" );
	$recipeResults = $database->resultSet();
	$numberRecipes = count($recipeResults);	
?>

<section id="recipesResults">      
     <div class="bestRecipes">
          <div class="container">
	<br>
	  <div class="col"><hr></div>
	  <div class="col"><h2 class='display-5 text-center'>Ukupno ima <span> <?php echo $numberRecipes; ?></span> recepata koji ispunjavaju zadate kriterijume </h2></div>
	  <div class="col"><hr></div>
	<br>

	 <div class="row">
                <?php
                     	
                  // Ispis pronadjenih recepata petljom, slucaj samo kategorije
                     $x = ($page-1) * $limit;
                     $y = $x + $limit;

                      while ($x < $y){ 
                	  if (!($x > ($numberRecipes-1))) {
                	  	
                	$recipe = $recipeResults[$x];		  
                	$photos = $recipe['recipe_photos'];
                	$photoArray = explode(",", $photos);
                	$photoId = $photoArray[0];
                	$database->query("SELECT photo_alt, photo_link FROM photos WHERE status=1 AND photo_id=$photoId");
                	$photoSingle = $database->single();
                	$recipeRating = $recipe['avg_rating']. ""; 
                	$nFullStars = $recipeRating[0]; 
                	$halfOrEmptyStar = $recipeRating[2];                 	

               ?> 
                       
                      <div class="col-md-3">
                        <div class="card  card-recipes">
                          <div class="double"><a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipe['recipe_id']; ?>/<?php echo $recipe['recipe_permalink']; ?>"><h5 class="card-title text-center"><?php echo $recipe['recipe_title']; ?></h5></a></div>
                          <a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipe['recipe_id']; ?>/<?php echo $recipe['recipe_permalink']; ?>">
                            <img class="card-img-top" src="assets/img/<?php echo $photoSingle['photo_link']; ?>" alt="<?php echo $photoSingle['photo_alt']; ?>">
                          </a>
 
                          <p>
<?php

if ($recipe['avg_rating'] < 5.0) {
	for ($i = 0; $i < $nFullStars; $i++) {
		echo '<img src="assets/img/zv-pu.png" alt="rejting" class="smallImg">';
	}
	if ($halfOrEmptyStar < 5) {
		echo '<img src="assets/img/zv-pr.png" alt="rejting" class="smallImg">';
	}elseif ($halfOrEmptyStar >= 5) {
		echo '<img src="assets/img/zv-po.png" alt="rejting" class="smallImg">';
	}
	for ($i = 0; $i < (4-$nFullStars); $i++) {
		echo '<img src="assets/img/zv-pr.png" alt="rejting" class="smallImg">';
	}

}elseif ($recipe['avg_rating'] == 5.0) {
	for ($i = 0; $i < 5; $i++) {
		echo '<img src="assets/img/zv-pu.png" alt="rejting" class="smallImg">';
	}
}
?>  

                             &nbsp; <?php echo $recipe['avg_rating']; ?> &nbsp; (<?php echo $recipe['no_votes']; ?> &nbsp; glasova)<br>
                           <img src="assets/img/sat.png" alt="vreme pripreme" class="smallImg"> &nbsp; <?php echo $recipe['prep_time']; ?> &nbsp; min<br>
                           <img src="assets/img/posuda.png" alt="posuda" class="smallImg"> &nbsp; <?php echo $recipe['dirty_dishes']; ?> &nbsp; kom prljavog posuđa
                         </p>
                        </div>
                       </div>

                <?php 
                } $x++;
            } ?> <!-- Kraj ispisa pronadjenih recepata petljom -->


             </div><!--kraj row -->
          </div>
      </div>
</section> <!-- kraj rezultati pretrage -->


<section id="paginationHome">
	<br>
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center">

	<?php if ($numberRecipes > 0){  //iscrtavanje paginacije

		$i = ($numberRecipes/$limit);
		$i = ceil($i);

		if ($i == 1) {
			echo '<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';

		}elseif (($i > 1) && ($i < 8)) {
			for ($e = 1; $e < ($i+1); $e++) {
				if ($e == $page) {
					echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
				}else{
					echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
				       }
			}

		}elseif ($i >= 8) {
			if ($page >= 5){
				if ($page > ($i-4)) {
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
					for ($e = ($i-4); $e < ($i+1); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
						}
					}

				}else{
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>'; 

					for ($e = $page-2; $e < ($page+3); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
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
						echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
					}
				}
				echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
				echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
			}			
		}
	?>
       </ul>
   </nav>
</section>

<?php } ?>

<?php	
}
function sanitize($string){     //proveriti sa nekim oko sanitacije ulaznih stringova za user input comment
	$a = trim($string);
	$b = htmlspecialchars($a);
	$c = htmlentities($b);
	//$c .= "sanitize";
	return $c;
}

