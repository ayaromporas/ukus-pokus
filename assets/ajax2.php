<?php
include '../config.php';
include '../classes/Ajax.php';
include '../classes/Database.php';
include '../classes/Model.php';
include '../classes/Query.php';
$ajax = new Ajax();
$database = new Database();

//$data = $posude = $kategorije = $vreme = $rejting = "";
$mouseover = '"#28a745"';
$mouseout = '"#212121"';
$query = "";

if (isset($_POST['data']) && is_array($_POST['data'])) {
	$data = $_POST['data'];
	//echo "Namirnice: ";
    //print_r($data);
}
if (isset($_POST['posude']) && is_array($_POST['posude'])) {
	$posude = $_POST['posude'];
	//echo "Posude: ";
    //print_r($posude);
}
if (isset($_POST['kategorije']) && is_array($_POST['kategorije'])) {
	$kategorije = $_POST['kategorije'];
	//echo "Kategorije: ";
    //print_r($kategorije);
}
if (isset($_POST['vreme']) && is_array($_POST['vreme'])) {
	$vreme = $_POST['vreme'];
	//echo "Vreme: ";
    //print_r($vreme);
}
if (isset($_POST['rejting']) && is_array($_POST['rejting'])) {
	$rejting = $_POST['rejting'];
	//echo "Rejting: ";
    //print_r($rejting);
}

// Ako korisnik trazi bilo sta od kategorija, vremena, posuda ili namirnica
if (isset($_POST['data']) or isset($_POST['posude']) or isset($_POST['kategorije']) or isset($_POST['vreme'])) {

	// Upit za dobijanje svih recepata koji imaju trazene rejtinge
    if (isset($_POST['rejting']) && is_array($_POST['rejting'])) {
		$rejting = $_POST['rejting'];
		$query = " AND (";
		foreach ($rejting as $key) {
			$query .= "rating_name=". $key ." OR ";
		}
		$query = rtrim($query, "OR ");
		$query .= ") ";
		//echo $query;

		$database->query("SELECT * FROM ratings WHERE (status = 1) $query  ORDER BY rating_name DESC");
		$recRows = $database->resultSet();
		$nizIdpoRejtingu = array();
		foreach ($recRows as $key) {
			array_push($nizIdpoRejtingu, $key['recipe_id']);
		}
		//echo "Recepti koji imaju rejting koji trazite:" ;
        //print_r($nizIdpoRejtingu);
        $query = " AND (";
		foreach ($nizIdpoRejtingu as $row) {
		             $query .= "recipe_id like '%" . "," .$row. "," . "%' OR ";
	 	}
		$query= rtrim($query, "OR ");
		$query .= ") ";
		//echo "query za upit u recepte po rejtingu koji je odabran";
        //echo $query;
    }  // kraj upita za id-jeve recepata po trazenom rejtingu

	// Upit koji sadrzi trazene namirnice
    if (isset($_POST['data']) && is_array($_POST['data'])) {
		$query = " AND (";
		foreach ($data as $row) {
		 $query .= "recipe_ingrs_id like '%" . "," .$row. "," . "%' AND ";
	 	}
		$query= rtrim($query, "AND ");
		$query .= ")";
	}

	// Upit koji sadrzi trazene kategorije
    if (isset($_POST['kategorije']) && is_array($_POST['kategorije'])) {
		$query .= " AND (";
		foreach ($kategorije as $row) {
		 $query .= "recipe_cats like '%" . "," .$row. "," . "%' AND ";
	 	}
		$query= rtrim($query, "AND ");
		$query .= ")";
		//echo $query;
    }

	// Upit koji sadrzi trazene sudove
    if (isset($_POST['posude']) && is_array($_POST['posude'])) {
		$query .= " AND (";
		foreach ($posude as $row) {
		 $query .= "dirty_dishes = " . $row.  " OR ";
	 	}
		$query = rtrim($query, "OR ");
		$query .= ")";
		//echo $query;
    }

	// Upit koji sadrzi trazeno vreme pripreme
    if (isset($_POST['vreme']) && is_array($_POST['vreme'])) {
		$query .= " AND (";
		foreach ($vreme as $row) {
			if ($row == "15") {
				$query .= "(prep_time <=15) OR ";
			}
			if ($row == "30") {
				$query .= "(prep_time between 16 AND 30) OR ";
			}
			if ($row == "45") {
				$query .= "(prep_time between 31 AND 45) OR ";
			}
			if ($row == "60") {
				$query .= "(prep_time between 46 AND 60) OR ";
			}
			if ($row == "120") {
				$query .= "(prep_time between 61 AND 120) OR ";
			}
	 	}
		$query = rtrim($query, "OR ");
		$query .= ")";
		//echo $query;
    }

	//echo $query;
    $database->query("SELECT * FROM recipes WHERE (status = 1) $query ");
	$recRows = $database->resultSet();
	$numberRecipes = count($recRows);
	echo "<div class='row'>";
	echo "<div class='col-sm-12 text-center'>";
	echo "<h4>Ukupno recepata koji ispunjavaju tražene kriterijume : " . "<span style='color: #28a745 !important; font-size: 2rem;'>" . $numberRecipes ."</span></h4>";
	echo "</div></div><br><br>";

	if ($numberRecipes > 0) {
		foreach ($recRows as $item) {
			echo "<div class='row'>";
			echo "<div class='col-sm-12 text-center'>";

		             $id= mb_strtolower($item['recipe_id']." ".$item['recipe_title'], 'UTF-8');
		             $id = str_replace(" ", "-", $id);
		             $id = $ajax->convertExtendedToNormal($id);
	        			echo '<p>';
				echo "<a href='recipe/$id' class='recipelist' style='color: #212121 !important;' onMouseOver=this.style.color=$mouseover onMouseOut=this.style.color=$mouseout>" . $item['recipe_title'] . " </a>";
	        			echo "</p>";
	        		}
	       		echo "<hr><br><p>Ovde dođe paginacija &nbsp; <strong> 1 ... 5 6 7 8 9 10 11 ... 153 </strong></p>";
	       		echo "</div></div><br><br>";
    		}

// Upit za dobijanje svih recepata koji imaju trazene rejtinge
} elseif ((isset($_POST['rejting']) && is_array($_POST['rejting'])) and !(isset($_POST['data']) and isset($_POST['posude']) and isset($_POST['kategorije']) and isset($_POST['vreme']))) {

	$rejting = $_POST['rejting'];
	$query = " AND (";
	foreach ($rejting as $key) {
		$query .= "rating_name=". $key ." OR ";
	}
	$query = rtrim($query, "OR ");
	$query .= ") ";
	//echo $query;

	$database->query("SELECT * FROM ratings WHERE (status = 1) $query ");
	$recRows = $database->resultSet();
	$nizIdpoRejtingu = array();
	foreach ($recRows as $key) {
		array_push($nizIdpoRejtingu, $key['recipe_id']);
	}
	//echo "Recepti koji imaju rejting koji trazite:" ;
    //print_r($nizIdpoRejtingu);
    $query = " AND (";
	foreach ($nizIdpoRejtingu as $row) {
	             $query .= "recipe_id="  .$row .  " OR ";
 	}
	$query= rtrim($query, "OR ");
	$query .= ")";

	//echo $query;
    $database->query("SELECT * FROM recipes WHERE (status = 1) $query ");
	$recRows = $database->resultSet();
	$numberRecipes = count($recRows);
	echo "<div class='row'>";
	echo "<div class='col-sm-12 text-center'>";
	echo "<h4>Ukupno recepata koji ispunjavaju tražene kriterijume : " . "<span style='color: #28a745 !important; font-size: 2rem;'>" . $numberRecipes ."</span></h4>";
	echo "</div></div><br><br>";

	if ($numberRecipes > 0) {
		foreach ($recRows as $item) {
			echo "<div class='row'>";
			echo "<div class='col-sm-12 text-center'>";

		             $id= mb_strtolower($item['recipe_id']." ".$item['recipe_title'], 'UTF-8');
		             $id = str_replace(" ", "-", $id);
		             $id = $ajax->convertExtendedToNormal($id);
	        			echo '<p>';
				echo "<a href='recipe/$id' class='recipelist' style='color: #212121 !important;' onMouseOver=this.style.color=$mouseover onMouseOut=this.style.color=$mouseout>" . $item['recipe_title'] . " </a>";
	        			echo "</p>";
	        		}
	       		echo "<hr><br><p>Ovde dođe paginacija &nbsp; <strong> 1 ... 5 6 7 8 9 10 11 ... 153 </strong></p>";
	       		echo "</div></div><br><br>";
    		}
}
