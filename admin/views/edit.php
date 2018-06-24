<?php
$query = new Query;

if(isset($_POST["submit"])){
	$recipe_id = $recipe_title = $description = $prepere_time = $dirty_dishes = $recipe_ingrs_id = $old_ingredients = $new_ingredients = $recipe_cats = $instructions = $old_images = "";

	$recipe_id = $_GET['id'];
	$recipe_title = strip_tags($_POST["name_recipes"]);
	$description = strip_tags($_POST["descriptions"]);
	$prepere_time = strip_tags($_POST["time"]);
	$dirty_dishes = strip_tags($_POST["dirty_dishes"]);
	if(isset($_POST["instructions"])){
		$instructions = $_POST["instructions"];
	}
	if(isset($_POST["categories"])){
		$cats = implode(",",$_POST["categories"]); //pretvaranje niza u string (elementi odvojeni zarezom)
		$recipe_cats = strip_tags($cats);
	}

	//izcitavanje starih i novih sastojaka
		$num_of_old_ingrs = strip_tags($_POST["old_ingredients"]);// broj iteracija
		$i=1;
		while($i <= $num_of_old_ingrs){
			if(isset($_POST["ingrs".$i])){
				$ingr_id_array = explode(",",$_POST["ingrs".$i]); //pretvaranje stringa u niz
				$recipe_ingrs_id .= ",".$ingr_id_array[0]; //pravljne stringa od id-jeva sastojaka

				$old_ingr = strip_tags($_POST["ingrs".$i])."/";
				$old_ingredients .= $old_ingr; //postojece kombinacije id-sastojka,kolicina,jedinica-mere
			}
			$i++;
		}
		$recipe_ingrs_id = $recipe_ingrs_id.","; //dodavanje zareza na kraju stringa


		$num_of_new_ingrs = strip_tags($_POST["new_ingredients"]); //broj iteracija
		$i=1;
		while($i <= $num_of_new_ingrs){
			if(isset($_POST["ingredients".$i])){
				if($_POST["ingredients".$i] != "" && $_POST["kolicina".$i] != "" && $_POST["units".$i] != ""){
					$new_ingr = strip_tags($_POST["ingredients".$i]).",".strip_tags($_POST["kolicina".$i]).",".strip_tags($_POST["units".$i])."/";
					$new_ingredients .= $new_ingr;

					$recipe_ingrs_id .= $_POST["ingredients".$i].","; //dodavanje novih id-jeva u string za id-jeve sastojaka
				}
			}
			$i++;
		}
		$new_ingredients = substr($new_ingredients, 0, -1);

		if($new_ingredients == ""){ //ako nema novih sastojaka skida se poslednji slesh
			$old_ingredients = substr($old_ingredients, 0, -1);
		}

	$recipe_ingrs = $old_ingredients.$new_ingredients;


	//izcitavanje postojecih slika
		$num_of_old_images = strip_tags($_POST["num_of_old_images"]);
		$i=1;
		while($i <= $num_of_old_images){
			if(isset($_POST["old_image_id".$i])){
				$old_img = strip_tags($_POST["old_image_id".$i]);
				$old_images .= ",".$old_img;
			}
			$i++;
		}
		$old_images = substr($old_images, 1);

		$new_images = strip_tags($_POST["images_id"]);

	$recipe_photos = $old_images.$new_images;


	$query->update($recipe_id,$recipe_title,$description,$prepere_time,$dirty_dishes,$instructions,$recipe_cats,$recipe_ingrs,$recipe_ingrs_id,$recipe_photos);

	header("Refresh:0");
}

?>

<h1>Edit recipes</h1><hr>

<script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>



<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="recipe_id" value="<?php echo $viewmodel['recipe_id'];?>">
    <label><b>Ime Recepta</b></label>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" id="name_recipes" name="name_recipes" value="<?php echo $viewmodel['recipe_title'];?>" placeholder="Name recipes"><br>
    </div>
  </div>
    <label><b>Kratak opis</b></label>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="descriptions" value="<?php echo $viewmodel['description'];?>" placeholder="Do 200 karaktera"><br>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label><b>Vreme pripreme</b></label>
      <input type="text" class="form-control" name="time" value="<?php echo $viewmodel['prep_time'];?>" placeholder="Preparation time min">
    </div>
    <div class="col">
      <label><b>Prljavo posudje</b></label>
      <input type="text" class="form-control" name="dirty_dishes" value="<?php echo $viewmodel['dirty_dishes'];?>" placeholder="Dirty dishes"><br>
    </div>
  </div>


	<label><b>Sastojci</b></label>

	<!-- Milan logika citanja -->
	<?php // izvaenje ingr, kol, i unit iz baze
	$b=1;
		$ingr_options = $units_options = $ingrs = $units = "";

	$res = explode("/", $viewmodel['recipe_ingrs']);
	foreach ($res as $value) {
		$q = explode(",", $value);

		$kol = $q[1];
		$units = $query->soloquery('units', 'unit_id', $q[2]);

		$ingredients = $query->soloquery('ingredients', 'ingredient_id', $q[0]);
		?>
		<div id="sastojak<?php echo $b; ?>" class="row">

			<?php
			echo "<div class='col-4'>".$ingredients['ingredient_name']."</div>";
			echo "<div class='col-3'>".$kol."</div>";
			echo "<div class='col-3'>".$units['unit_name']."</div>";
			echo "<input type='hidden' name='ingrs".$b."' value='".$ingredients['ingredient_id'].",".$kol.",".$units['unit_id']."'>";
			?>

			<div class="clo-2">
				&nbsp &nbsp <button type="button" id='button_del<?php echo $b; ?>' onclick="closeDiv('sastojak<?php echo $b;?>')" > - </button>
			</div>
		</div><br>
	<?php
		$b++;
	}
		$b = $b-1;
		echo "<input type='hidden' name='old_ingredients' id='old_ingredients' value='".$b."'>";

		//------------------  PETAR  ----------------


		$ingr_options = $units_options = $ingrs = $units = "";

		foreach($query->allquery('ingredients') as $item){
			$ingr_options .= '<option value="'. $item['ingredient_id'] .'">'. $item['ingredient_name'] .'</option>';
			$ingrs .= $item['ingredient_id'].','.$item['ingredient_name'].'/';
		}

		foreach($query->allquery('units') as $item){
			$units_options .= '<option value="'. $item['unit_id'] .'">'. $item['unit_name'] .'</option>';
			$units .= $item['unit_id'] .','. $item['unit_name'] .'/';
		}

		$b=$b+1
	?>


	<div id="sastojakall">
		<div id="sastojak">
			<div class="row" id="sastojak<?php echo $b; ?>">

				<div class="col-4">
					<select class="form-control" name="ingredients1" id="">
						<option value=""></option>
						<?php echo $ingr_options; ?>
					</select>
				</div>

				<div class="col-3">
				  <input type="text" class="form-control" name="kolicina1" placeholder="kolicina">
				</div>

				<div class="col-3">
					<select class="form-control" name="units1" >
						<option value=""></option>
						<?php echo $units_options; ?>
					</select>
				</div>

				<div id="button-div<?php echo $b; ?>" class="col-2">
					<button type="button" class="button-del" id='button-del<?php echo $b; ?>' onclick="closeDiv('sastojak<?php echo $b;?>')"> - </button>
					<button type="button" id='button<?php echo $b; ?>' onclick='cloneFunction("<?php echo $b; ?>","<?php echo $ingrs; ?>","<?php echo $units; ?>",1)'>+</button>
				</div>
			</div>
		</div>
		<input type="hidden" id="new_ingredients" name="new_ingredients" value="1">
	</div>
<!--- END PETAR  -->


    <label><b>Kategorije</b></label>
    <?php $viewmodel['recipe_cats'] ; ?>
	<select class="form-control form-control-lg custom-select" name="categories[]" multiple aria-label="Search for..." >
		<?php $rezultat = explode(",", $viewmodel['recipe_cats']); ?>
		<?php foreach($query->allquery('categories') as $item) :?>
				<?php foreach($rezultat as $bat) :?>
		  			<?php if ($item['cat_id'] == $bat){ ?>
						<option value="<?php echo $item['cat_id']; ?>" selected> <?php echo $item['cat_name']; ?> </option>
		  			<?php } else { ?>
						<?php //?>
		  			<?php } ?>
				<?php endforeach; ?>
				<option value="<?php echo $item['cat_id']; ?>"> <?php echo $item['cat_name']; ?> </option>
		<?php endforeach; ?>

	</select>

	<div class="form-group">
		<label><b>Opis recepta</b></label>
		<textarea class="form-control" name="instructions" id="exampleFormControlTextarea1" rows="10"><?php echo $viewmodel['instructions'];?></textarea>
	</div>


	<label><b>Slike</b></label><br>
	<?php

		$soloimage = explode(",",$viewmodel['recipe_photos']);

		$ii=1;
		foreach($soloimage as $id){

			$imageprint = $query->soloquery('photos', 'photo_id', $id);
			echo '<div id="image'.$ii.'">
					<img src="../../../assets/img/'.$imageprint['photo_link'].'" width="170" alt="'.$imageprint['photo_alt'].'">&nbsp&nbsp <strong>';
			echo 	$imageprint['photo_link'].'</strong> &nbsp <button class="btn btn-danger btn-sm" onclick="delPhoto('.$id.",'image".$ii."'".')"> Delete </button>';
			echo	"<input type='hidden' name='old_image_id".$ii."' value='".$imageprint['photo_id']."' >";
			echo '</div><br>';

			$ii++;
		}

		$num_of_old_images = $ii-1; //broj starih slika u receptu (broj iteracija koje petlja treba da izvrsi da izcita stare fotke)
		echo "<input type='hidden' id='num_of_old_images' name='num_of_old_images' value='".$num_of_old_images."'>";
	?>
	<div>
		<div>
			<br><button type="button" id="add_photo" onclick="addImage()" class="">Add image</button>
		</div>

		<div>
			<div id="added_images"></div>
		</div>

		<input type="hidden" id="images_id" name="images_id" value=""><br>
	</div>



	<div class="row">
		<div class="col">
			<input class="btn btn-primary" name="submit" type="submit" value="Add" />
		</div>
	</div>

	<input type="hidden" name="ime" value="<?php echo $userId;?>">

</form>


<script>
//  $("select").select2();
//
// $("select").on("select2:unselect", function (evt) {
//   if (!evt.params.originalEvent) {
//     return;
//   }
//
//   evt.params.originalEvent.stopPropagation();
// });

</script>
