<?php

include ('../config.php');
include ('../classes/Model.php');
include ('../classes/Query.php');
$upit = new Query();

if ($_POST['data'] !=null && $_POST['data'] !="") {

	if (isset($_POST['cat']) && $_POST['cat'] !="" && $_POST['cat'] !=null) {
		$cat = $_POST['cat'];
		$data = $_POST['data'];
		$query = "";
	
  		foreach ($cat as $roww) {
        			 $query .= "recipe_cats like '%" . "," .$roww. "," . "%' AND ";
         			foreach ($data as $row) {
     			 $query .= "recipe_ingrs_id like '%" . "," .$row. "," . "%' AND ";
   			 }
       		}

        		$query= rtrim($query, "AND ");
		$upit->query("SELECT recipe_id,recipe_title FROM recipes WHERE ". $query );
		$recRows = $upit->resultSet();
		$numberRecipes = count($recRows);
		if(isset($_POST['page']) && ($_POST['page'] !=null && $_POST['page'] !="") ) {
       			$page = $_POST['page'];

       			$start = ($page-1)*12;
       			     			
          	}else {
       		$page =1;
       		$start = 0;
        		}
        $end = 12; 

      	$recRowsSliced = array_slice($recRows,$start,$end);

		
		echo "<div class='col-sm-12 col-xl-12 text-center'>";
		echo "<h4>Ukupno recepata koji ispunjavaju tražene kriterijume : " . "<span style='color: #28a745 !important; font-size: 2rem;'>" . $numberRecipes ."</span></h4>";
		echo "</div><br><br>";

		if($numberRecipes > 0){	
			$mouseover = '"#28a745"';
			$mouseout = '"#212121"';

			
			
			foreach ($recRowsSliced as $item) {	  
				     			
				$id= mb_strtolower($item['recipe_id']." ".$item['recipe_title'], 'UTF-8');
				$id = str_replace(" ", "-", $id);
				$id = $upit->convertExtendedToNormal($id);
				echo "<div class='col-sm-12 col-xl-4 text-center'>"; 
	        	echo '<p>';
				echo "<a href='recipe/$id' class='recipelist' style='color: #212121 !important;' onMouseOver=this.style.color=$mouseover onMouseOut=this.style.color=$mouseout>" . $item['recipe_title'] . " </a>";
	        	echo "</p>";
	        	echo "</div>";
	        		}
	        	echo "<div class='col-sm-12 col-xl-12 text-center'>";
	       		echo " <ul class='pagination pagination-sm justify-content-center'>";
	       		echo printPagination($numberRecipes, $page);
	       		echo "</ul>";
	       		echo "</div><br><br>";
    		}

             } else {
             	$data = $_POST['data'];	
		$query = "";
		foreach ($data as $row) {
			$query .= "recipe_ingrs_id like '%" . "," .$row. "," . "%' AND ";
   		}
	  	$query= rtrim($query, "AND ");
		$upit->query("SELECT recipe_id,recipe_title FROM recipes WHERE ". $query );
		$recRows = $upit->resultSet();
		$numberRecipes = count($recRows);
		if(isset($_POST['page']) && ($_POST['page'] !=null && $_POST['page'] !="") ) {
       			
       			$page = $_POST['page'];

       			$start = ($page-1)*12;
       			     			
       		}else {
       			$page =1;
       			$start = 0;
       		}
       	$end = 12; 

      	$recRowsSliced = array_slice($recRows,$start,$end);

		
		echo "<div class='col-sm-12 col-xl-12 text-center'>";
		echo "<h4>Ukupno recepata koji ispunjavaju tražene kriterijume : " . "<span style='color: #28a745 !important; font-size: 2rem;'>".$numberRecipes ."</span></h4>";
		echo "</div><br><br>";

			if($numberRecipes > 0){	
			$mouseover = '"#28a745"';
			$mouseout = '"#212121"';

			
			
			foreach ($recRowsSliced as $item) {	        			
				$id= mb_strtolower($item['recipe_id']." ".$item['recipe_title'], 'UTF-8');
				$id = str_replace(" ", "-", $id);
				$id = $upit->convertExtendedToNormal($id);
				echo "<div class='col-sm-12 col-xl-4 text-center'>";
	        	echo '<p>';
				echo "<a href='recipe/$id' class='recipelist' style='color: #212121 !important;' onMouseOver=this.style.color=$mouseover onMouseOut=this.style.color=$mouseout>" . $item['recipe_title'] . " </a>";
	        	echo "</p>";
	        	echo "</div>";
	        		}
	        	echo "<div class='col-sm-12 col-xl-12 text-center'>";
	       		echo " <ul class='pagination pagination-sm justify-content-center'>";
	       		echo printPagination($numberRecipes, $page);
	       		echo "</ul>";
	       		echo "</div><br><br>";
    		}
    	}
		} else {
			if (isset($_POST['cat']) && $_POST['cat'] !="" && $_POST['cat'] !=null) {
				$cat = $_POST['cat'];		
				$query = "";		
				foreach ($cat as $row) {
		      			$query .= "recipe_cats like '%" . "," .$row. "," . "%' AND ";
		       		}
		       		$query= rtrim($query, "AND ");
				$upit->query("SELECT recipe_id,recipe_title FROM recipes WHERE ". $query );
				$recRows = $upit->resultSet();
				$numberRecipes = count($recRows);
				if(isset($_POST['page']) && ($_POST['page'] !=null && $_POST['page'] !="") ) {
       			$page = $_POST['page'];

       			$start = ($page-1)*12;
       			     			
       	  	}else {
       			$start = 0;
       			$page =1;
       		}
       		$end = 12; 

      	$recRowsSliced = array_slice($recRows,$start,$end);

				
				echo "<div class='col-sm-12 col-xl-12 text-center'>";
				echo "<h4>Ukupno recepata koji ispunjavaju tražene kriterijume : " . "<span style='color: #28a745 !important; font-size: 2rem;'>" . $numberRecipes ."</span></h4>";
				echo "</div><br><br>";

				if($numberRecipes > 0){	
					$mouseover = '"#28a745"';
					$mouseout = '"#212121"';

			
			
			foreach ($recRowsSliced as $item) {	        			
				$id= mb_strtolower($item['recipe_id']." ".$item['recipe_title'], 'UTF-8');
				$id = str_replace(" ", "-", $id);
				$id = $upit->convertExtendedToNormal($id);
				echo "<div class='col-sm-12 col-xl-4 text-center'>";
	        	echo '<p>';
				echo "<a href='recipe/$id' style='color: #212121 !important;' onMouseOver='this.style.color=$mouseover' onMouseOut='this.style.color=$mouseout'>" . $item['recipe_title'] . " </a>";
	        	echo "</p>";
	        	echo "</div>";
	        		}
	        	echo "<div class='col-sm-12 col-xl-12 text-center'>";
	       		echo " <ul class='pagination pagination-sm justify-content-center'>";
	       		echo printPagination($numberRecipes, $page);
	       		echo "</ul>";
	       		echo "</div><br><br>";
	    			}
        			}
       		}

			
		


       		function printPagination($numberRecipes, $page){
       			
					$returnPagination="";
       				
       				$pages =ceil($numberRecipes / 12);

       			if ($page > 1) { 
       			
				$returnPagination .=  "<a class='page-link' style='cursor:pointer;' id ='1'> Prva </a>";
			    $returnPagination .=  "<a class='page-link' title='Back' style='cursor:pointer;' id ='".($page-1)."'> < </a>";
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
       				$returnPagination .=  "<a class='page-link' style='color: red; font-weight:700;cursor:pointer;' id ='".$pageid."'>" . $pageid . "</a>";
       			}else {
			
				$returnPagination .=  "<a class='page-link' style='cursor:pointer;' id ='".$pageid."'>" . $pageid . "</a>";
				}
			
		 
				}


				if ($page< $pages) { 
				  if ($page < $pages - 3) { $returnPagination .=  "<a class='page-link' id='pointa'> ... </a>";}
				 $returnPagination .=  "<a class='page-link' style='cursor:pointer;' title='Next' id ='".($page+1)."'> > </a>";
				 $returnPagination .=  "<a class='page-link' style='cursor:pointer;' id ='".$pages."' > Poslednja <span class='badge badge-warning text-center' id ='".$pages."'>". $pages ."</span></a>";
		}

			return $returnPagination;
       			}




