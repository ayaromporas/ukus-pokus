<?php
$categorymodel = new CategoryModel();
$queryInstance = new Query();

$catId = $categorymodel->getId();

//upit za dobijanje recepata iz konkretne kategorije

$selector = "recipe_id,recipe_title";
$query = " AND (recipe_cats like '%," .  $catId . ",%')";
$recipesAll = $queryInstance->allRows($selector,"recipes",$query);

//upit za dobijanje detalja kategorije
$query = "cat_id=" . $catId;
$catName = $queryInstance->singleRow("categories",$query);




?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-12 text-center">
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

			 if (isset($_GET['name']) && $_GET['name'] !=null && $_GET['name'] !="") {
		  		$page = $_GET['name'];
       			$start = ($page-1)*12;
			} else {
		   		$start = 0;
       			$page =1;
			}

       			$end = 12; 

      	$recRowsSliced = array_slice($recipesAll,$start,$end);
			// ispis liste recepata
			foreach ($recRowsSliced as $recipe) {
				$recipeId= mb_strtolower($recipe['recipe_id']." ".$recipe['recipe_title'], 'UTF-8');
          		$recipeId = str_replace(" ", "-", $recipeId);
          		$recipeId = $queryInstance->convertExtendedToNormal($recipeId);
				// $recipeId = $recipe['recipe_id'];
				$title = $recipe['recipe_title'];
				$link =  ROOT_URL ."recipe/". $recipeId;
				?>

				<div class='col-sm-12 col-xl-4 text-center'>					
				<p><a href='<?php echo $link ?>' style="color: #212121 !important;" onMouseOver="this.style.color='#28a745'"; onMouseOut="this.style.color='#212121'"><?php echo $title ?></a></p>
				</div>
			<?php
			}
			?>
				<div class='col-sm-12 col-xl-12 text-center'>
	       	    <ul class='pagination pagination-sm justify-content-center'>";
	       		<?php echo printPagination($numberRecipes, $page, $catId); ?>
	       		</ul>
	       		</div><br>
		
	</div>

</div> <!-- end container fluid -->

<?php
function printPagination($numberRecipes, $page,$catId){
       			
					$returnPagination="";
					$tablePagination = "category";
       				
       				$pages =ceil($numberRecipes / 12);

       			if ($page > 1) { 
       			
				$returnPagination .=  "<a class='page-link' style='cursor:pointer;' href='".ROOT_URL. "" .$tablePagination."/".$catId."/1' id ='1'> Prva </a>";
			    $returnPagination .=  "<a class='page-link' title='Back' style='cursor:pointer;' href='".ROOT_URL. "" .$tablePagination."/".$catId."/".($page-1)."' id ='".($page-1)."'> < </a>";
			 	if ($page > 5) { 
			 	$returnPagination .=  "<a class='page-link' id='point'> ... </a>";}
					}
				if ($page>3) {
							if ($page>($pages-3)){
								$startt = $page - 3;
						 		$endd = $pages;
							} else {
								$startt = $page - 3;
						 		$endd = $page + 3;
							}	
						 } else {
						 	if ($pages >= 7){
						 	$startt = 1;
						 	$endd = 7;
						 }else {
						 	$startt = 1;
						 	$endd = $pages;
						 }
						 }
						
       			for ($pageid=$startt; $pageid<=$endd; $pageid++) {

       			if ($pageid == $page){
       				$returnPagination .=  "<a class='page-link' style='color: red; font-weight:700;cursor:pointer;' href='".ROOT_URL. "" .$tablePagination."/".$catId."/".$pageid."' id ='".$pageid."'>" . $pageid . "</a>";
       			}else {
			
				$returnPagination .=  "<a class='page-link' style='cursor:pointer;' href='".ROOT_URL. "" .$tablePagination."/".$catId."/".$pageid."' id ='".$pageid."' id ='".$pageid."'>" . $pageid . "</a>";
				}
			
		 
				}


				if ($page< $pages) { 
				  if ($page < $pages - 3) { $returnPagination .=  "<a class='page-link' id='pointa'> ... </a>";}
				 $returnPagination .=  "<a class='page-link' style='cursor:pointer;' title='Next' href='".ROOT_URL. "" .$tablePagination."/".$catId."/".($page+1)."' id ='".($page+1)."' id ='".($page+1)."'> > </a>";
				 $returnPagination .=  "<a class='page-link' style='cursor:pointer;' href='".ROOT_URL. "" .$tablePagination."/".$catId."/".$pages."' id ='".$pages."' > Poslednja <span class='badge badge-warning text-center' id ='".$pages."'>". $pages ."</span></a>";
		}

			return $returnPagination;
       			}




