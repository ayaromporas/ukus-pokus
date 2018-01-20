<?php
$categorymodel = new CategoryModel();
$queryInstance = new Query();

$catId = $categorymodel->getId();

//upit za dobijanje recepata iz konkretne kategorije

$query = " AND (recipe_cats like '%," .  $catId . ",%')";
$recipesAll = $queryInstance->allRows("recipes",$query);

//upit za dobijanje detalja kategorije
$query = "cat_id=" . $catId;
$catName = $queryInstance->singleRow("categories",$query);




?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12 text-center">
			<br><h2>Recepti koji pripadaju kategoriji <span class='green'><?php  echo $catName['cat_name'];  ?></span> </h2><br>
		</div>	
	</div>

	<!-- ispis liste recepata -->
	<div class="row">
		
			<?php
				$numberRecipes = count($recipesAll);
				?>
			 <div class='col-sm-12 col-xl-12 text-center'>
			 <h4>Ukupan broj recepata u ovoj kategoriji je :<span style='color: #28a745 !important; font-size: 2rem;'> <?php echo $numberRecipes ?></span></h4>
			 </div><br>
			 <?php
			// ispis liste recepata
			foreach ($recipesAll as $recipe) {
				$recipeId= mb_strtolower($recipe['recipe_id']." ".$recipe['recipe_title'], 'UTF-8');
          		$recipeId = str_replace(" ", "-", $recipeId);
          		$recipeId = $queryInstance->convertExtendedToNormal($recipeId);
				// $recipeId = $recipe['recipe_id'];
				$title = $recipe['recipe_title'];
				$link =  ROOT_URL ."recipe/". $recipeId;
				$mouseover = '#28a745';
				$mouseout = '#212121';
				?>
				<div class='col-sm-12 col-xl-4 text-center'>
					
				<p><a href=' <?php echo $link ?>' style="color: #212121 !important;" onMouseOver="this.style.color='#28a745'"; onMouseOut="this.style.color='#212121'"><?php echo $title ?></a></p>
			
				
				</div>
			<?php
			}
			?>
				<div class='col-sm-12 col-xl-12 text-center'>
	       	    <ul class='pagination pagination-sm justify-content-center'>";
	       	    	<br><p>Ovde dođe paginacija... 1 ... 5 6 7 8 9 10 11 ... 128</p><br>
	       		<!-- echo printPagination($numberRecipes, $page); -->
	       		</ul>
	       		</div><br>
		
	</div>











</div> <!-- end container fluid -->


