<?php

$ingredients = $viewmodel[0];  //spisak svih namirnica
$units = $viewmodel[1];  //spisak svih jedinica mere
$cats = $viewmodel[2];  //spisak svih kategorija
$recipe = $viewmodel[3]; // recepat koji se edituje
$photos = $viewmodel[4]; // sve slike koje pripadaju receptu
$recipeIngrsAll = $viewmodel[5]; // sastojci, kolicina i mere za izabrani recepat

$ingsAllOption = "<select name='ingredients[]' class='select2'>";
foreach ($ingredients as $ingredient) {
	$id = $ingredient['ingredient_id'];
	$name = $ingredient['ingredient_name'];

	$ingsAllOption .= "<option value="."''"."></option><option value='" . $id . "'>" . $name . "</option>";
}

$ingsAllOption .= "</select>";
//echo $ingsAllOption;

$unitsAllOption = "<select name='units[]' class='select2'>";
foreach ($units as $unit) {
	$id = $unit['unit_id'];
	$name = $unit['unit_name'];

	$unitsAllOption .= "<option value="."''"."></option><option value='" . $id . "'>" . $name . "</option>";
}

$unitsAllOption .= "</select>";
echo $unitsAllOption;





?>
 <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>

<?php
if(($superadmin || $admin || $editor) === true){

?>

<div class="box-typical box-typical-padding">
	<h5 class="m-t-lg with-border text-center"><i class="font-icon red fas fa-utensils"></i>&nbsp;&nbsp;&nbsp;<strong>Izmena recepta: <?php echo $recipe['recipe_title']; ?></strong>&nbsp; &nbsp;&nbsp;<i class="font-icon red fas fa-utensils"></i></h5><br>


	<!-- forma za unos recepta -->
	<form method="POST" action="<?php echo ROOT_URL; ?>recipes/insert" name="newrecipe" enctype='multipart/form-data'>

		<!-- hidden, admin id -->
		<input type="hidden" name="authorid" value="<?php echo $_SESSION['user_id'] ; ?>" >

		<!-- naziv -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="recipetitle" value ="<?php echo $recipe['recipe_title']; ?>" placeholder='Početno slovo mora biti veliko, npr. "Američke palačinke"... ' name="recipetitle"></p>
			</div>
		</div>

		<!-- permalink -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Permalink</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="permalink" value="<?php echo $recipe['recipe_permalink']; ?>"  placeholder='Samo mala slova i crtice "-", npr. "americke-palacinke"... ' name="permalink"></p>
			</div>
		</div>

		<!-- kratak opis -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Kratak opis</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="6" class="summernote" id="description" placeholder="Kraći opis recepta u max. 2 rečenice..." name="description"><?php echo $recipe['description']; ?></textarea>
			</div>

		</div>

		<!-- vreme pripreme -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Vreme pripreme</label>
			<div class="col-sm-3">
				<p class="form-control-static"><input type="number" class="form-control" id="preptime" name="preptime" value="<?php echo $recipe['prep_time']; ?>" placeholder='Samo brojevi, npr. "30"... '></p>
			</div>
			<?php $optionsData = [1,2,3,4,5];
			?>
			<!-- broj prljavih sudova -->
			<label for="dirtydishes" class="col-sm-2 form-control-label">Isprljani sudovi</label>
			<div class="col-sm-3">
				<select id="dirtydishes" class="form-control" name="dirtydishes">
					<?php foreach($optionsData as $option) :?>
						<?php if ($option == $recipe['dirty_dishes'] && $option == 5){ ?>
							<option value="<?php echo $recipe['dirty_dishes']; ?>" selected> 5 i više</option>
						<?php } elseif ($option == 5 && $recipe['dirty_dishes'] > 5){ ?>
							<option value="<?php echo $recipe['dirty_dishes']; ?>" selected> 5 i više</option>
						 <?php } elseif ($option == $recipe['dirty_dishes']){ ?>
								<option value="<?php echo $recipe['dirty_dishes']; ?>" selected> <?php echo $recipe['dirty_dishes']; ?> </option>
					    <?php	}	elseif ($option == 5){ ?>
								<option value="5">5 i više</option>
							<?php } else { ?>
									<option value="<?php echo $option ?>"> <?php echo $option ?> </option>
						  <?php	}
					 endforeach; ?>
					<!-- <option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5 i više</option> -->
				</select>
			</div>
		</div>


		<!-- sastojci / kolicina / jedinica mere 1 -->
		<div class="form-group row addafterthis">
			<label for='ingredients' class='col-sm-12 form-control-label text-center'><strong>Sastojci, količine i jedinice mere</strong> <p>&nbsp;</p>
			</label>

			<?php foreach ($recipeIngrsAll as $recipeIngr):

				$singleInstruction = explode(",", $recipeIngr);
						// print_r($singleInstruction);

					$instructionIngrId = $singleInstruction [0];
					$amount = $singleInstruction [1];
					$unitInst = $singleInstruction[2];
					foreach ($ingredients as $ingr) {
						$ingrId = $ingr['ingredient_id'];
						$ingrName = $ingr['ingredient_name'];

						if($instructionIngrId == $ingrId){ ?>
							<div class='col-sm-4'>
							<select name='ingredients[]' class='select2'>
							<option value= "<?php echo $ingrId ?>"><?php echo $ingrName ?></option>;
						</select>
						</div>
						<?php
								break;
						} else {
							//
						}
					} ?>
					<div class='col-sm-3'>
						<p class='form-control-static'><input class='form-control'  name='ammount[]' value= "<?php echo $amount ?> " placeholder='Samo brojevi, npr. "300"...' ></p>
					</div>
					<?php
					foreach ($units as $unit) {
						$unitId = $unit['unit_id'];
						$unitName = $unit['unit_name'];

						if($unitId == $unitInst){ ?>
							<div class='col-sm-4'>
							<select name='units[]' class='select2'>
							<option value= "<?php echo $unitId ?> "><?php echo $unitName ?></option>;
						</select>
						</div>
						<?php
								break;
						} else {
							//
						}
					} ?>
					<div class='col-sm-1'>
						<p class='form-control-static'><a class='addfields' id="btn2"><i class='red fas fa-minus-square fa-2x'></i></a></p>
					</div>
					<?php
		 endforeach;
		 ?>

		</div>

		<!-- sastojci / kolicina / jedinica mere 2 -->
		<div class="form-group row">
			<!-- <label for='ingredients' class='col-sm-2 form-control-label'></label> -->
			<!-- sastojci -->
			<div class='col-sm-4'><?php echo $ingsAllOption; ?></div>
			<!-- kolicina -->
			<div class='col-sm-3'>
				<p class='form-control-static'><input type='number' class='form-control'  name='ammount[]' placeholder='Samo brojevi, npr. "300"...' ></p>
			</div>
			<!-- jedinica mere -->
			<div class='col-sm-4'><?php echo $unitsAllOption; ?></div>
			<!-- dugme + -->
			<div class='col-sm-1'>
				<p class='form-control-static'><a class='addfields' id="btn2"><i class='green fas fa-plus-square fa-2x'></i></a></p>
			</div>
		</div>

<?php

for ($i = 3; $i < 50; $i++) {
 ?>

<!-- sastojci / kolicina / jedinica mere <?php echo $i; ?> -->
		<div class="form-group row hidethis" id="set<?php echo $i; ?>">
			<label for='ingredients' class='col-sm-2 form-control-label'></label>
			<!-- sastojci -->
			<div class='col-sm-4'><?php echo $ingsAllOption; ?></div>
			<!-- kolicina -->
			<div class='col-sm-2'>
				<p class='form-control-static'><input type='number' class='form-control'  name='ammount[]' placeholder='Samo brojevi, npr. "300"...' ></p>
			</div>
			<!-- jedinica mere -->
			<div class='col-sm-2'><?php echo $unitsAllOption; ?></div>
			<!-- dugme + -->
			<div class='col-sm-1'>
				<p class='form-control-static'><a class='addfields' id='btn<?php echo $i; ?>'><i class='green fas fa-plus-square fa-2x'></i></a></p>
			</div>

		</div>

<?php
}
 ?>


		<!-- uputstvo za pravljenje -->
		<div  class="form-group row">
			<label class="col-sm-2 form-control-label">Uputstvo</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="10" class="summernote" id="instructions" placeholder="Uputstvo za pripremu, po koracima..." name="instructions" ><?php echo $recipe['instructions']; ?></textarea>
			</div>
		</div>

		<!-- kategorije -->
		<div  class="form-group row">
			<label for="cats" class="col-sm-2 form-control-label">Kategorije</label>
			<div class="col-sm-9">
				<select id="cats" name="cats[]" class="select2" multiple="multiple">
					<?php
						$flag;
					$ltrm = ltrim($recipe['recipe_cats'], ',');
					$rtrm = rtrim($ltrm, ',');
					$recipeCats = explode(",", $rtrm);
					$kk = count($recipeCats);
					foreach ($cats as $cat) {
						$catId = $cat['cat_id'];
						$catName = $cat['cat_name'];
						foreach ($recipeCats as $recipeCatsId) {
							if( $recipeCatsId == $catId){
								$flag = 1;
									break;
							} else {
								$flag = 0;
							}
					  }
							if ($flag == 1) {
		     				echo '<option value="'. $catId .'" selected>'. $catName .'</option>';
		     			} else {
		     				echo '<option value="'. $catId .'">'. $catName .'</option>';
		     			}
					}
					 ?>
				</select>
			</div>
		</div>
	<br>
		<!-- galerija slika -->
		<div class='d-flex flex-wrap'>

		<?php



		foreach ($photos as $photo) {
			$photoId = $photo['photo_id'];
			$photoTitle = $photo['photo_title'];
			$photoLink = $photo['photo_link'];

			?>

			<div class="card col-sm-3 pt-1" style="cursor:pointer;">
				<header>
					<label for="photo<?php echo $photoId; ?>" style="cursor:pointer;">
						<input type="checkbox" name="images[]" id="photo<?php echo $photoId; ?>" value="<?php echo $photoId; ?>" style="cursor:pointer;" checked> &nbsp; <span class="label label-pill"><?php echo $photoId; ?></span>  <?php echo $photoTitle; ?>
						<img src="<?php echo HOME; ?>assets/img/<?php echo $photoLink; ?>" class="imgrec my-2">
					</label>
				</header>

			</div>
			<?php
				}
			?>
			</div>

		<div  class="form-group row">
			<label class="col-sm-2 form-control-label">Galerija slika</label>
			<div class="col-sm-9">
				<div class="box-typical box-typical-padding">
					<p class="form-control-static"><input type="text" class="form-control" id="search-keywords" placeholder='Pretraga po nazivu malim slovima, npr "američke palačinke"...' name="search-keywords"></p>
					<div id="keywords-warning"></div>
					<div id="result"></div>

				</div>
			</div>
		</div>

		<!-- submit -->
		<div class="text-center">
			<button type="text" name="submit" value="submit" class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form><br>
</div><!--.box-typical-->

<script>

var keyword = "";
var page = 1;

//polje za pretragu po kljucnim recima u naslovu recepta
$("#search-keywords").keyup(function(){
	var keyword = $(this).val();

             console.log(keyword);
             //console.log(jQuery.type(keyword));
	var x = keyword.length;
	if((x < 5) && (x > 0)){
	 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 5 i više slova' + "</div>");
	 	$("#result").text ("");
		var keyword = "";
	}else{
		$("#keywords-warning").text ("");
		var keyword = $(this).val();
		//$("#result").text ("ovde dodju slike kad ajax radi");
		//console.log(keyword);
		return ajax_call(keyword);
	 }

});

//dodavanje polja za unos namirnica, kolicina i jedinica mere
$(".addfields").click(function() {
	var btn = $(this).attr('id').slice(3);
	var btn = parseInt(btn);
	var btn = btn+1;
	$("#set" + btn).removeClass('hidethis');
	// $(this).addClass('hidethis');
});




//ajax funkcija
function ajax_call(keyword) {
	if (    ((keyword == "") || (keyword == undefined) || (keyword == null))  ) {
		$("#result").text ("");
	}else{
		$.post("<?php echo ROOT_URL; ?>assets/ajaxPhotosRec.php", {keyword: keyword}, function(result){
            			$("#result").html(result);
    		});
	}
}

</script>


<?php




 ?>

  <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>









<?php
}elseif ($demo === true) {
?>


<div class="box-typical box-typical-padding">
	<h5 class="m-t-lg with-border text-center"><i class="font-icon red fas fa-utensils"></i>&nbsp;&nbsp;&nbsp;<strong>Unos novog recepta</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon red fas fa-utensils"></i></h5><br>


	<!-- forma za unos recepta -->
	<form >

		<!-- hidden, admin id -->
		<input type="hidden" value="#" >

		<!-- naziv -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" placeholder='Početno slovo mora biti veliko, npr. "Američke palačinke"... ' ></p>
			</div>
		</div>

		<!-- permalink -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Permalink</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" placeholder='Samo mala slova i crtice "-", npr. "americke-palacinke"... '></p>
			</div>
		</div>

		<!-- kratak opis -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Kratak opis</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="6" class="summernote" placeholder="Kraći opis recepta u max. 2 rečenice..." >Kraći opis recepta u max. 2 rečenice...</textarea>
			</div>

		</div>

		<!-- vreme pripreme -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Vreme pripreme</label>
			<div class="col-sm-3">
				<p class="form-control-static"><input type="number" class="form-control"  placeholder='Samo brojevi, npr. "30"... '></p>
			</div>

			<!-- broj prljavih sudova -->
			<label for="dirtydishes" class="col-sm-2 form-control-label">Isprljani sudovi</label>
			<div class="col-sm-3">
				<select class="form-control" >
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5 i više</option>
				</select>
			</div>
		</div>


		<!-- sastojci / kolicina / jedinica mere 1 -->
		<div class="form-group row addafterthis">
			<label for='ingredients' class='col-sm-2 form-control-label'>Sastojci, količine i jedinice mere</label>
			<!-- sastojci -->
			<div class='col-sm-4'><?php echo $ingsAllOption; ?></div>
			<!-- kolicina -->
			<div class='col-sm-2'>
				<p class='form-control-static'><input type='number' class='form-control'   placeholder='Samo brojevi, npr. "300"...' ></p>
			</div>
			<!-- jedinica mere -->
			<div class='col-sm-2'><?php echo $unitsAllOption; ?></div>
			<!-- dugme + -->
			<!-- <div class='col-sm-1'>
				<p class='form-control-static'><a class='addfields' id="btn1"><i class='green fas fa-plus-square fa-2x'></i></a></p>
			</div> -->
		</div>

		<!-- sastojci / kolicina / jedinica mere 2 -->
		<div class="form-group row">
			<label for='ingredients' class='col-sm-2 form-control-label'></label>
			<!-- sastojci -->
			<div class='col-sm-4'><?php echo $ingsAllOption; ?></div>
			<!-- kolicina -->
			<div class='col-sm-2'>
				<p class='form-control-static'><input type='number' class='form-control' placeholder='Samo brojevi, npr. "300"...' ></p>
			</div>
			<!-- jedinica mere -->
			<div class='col-sm-2'><?php echo $unitsAllOption; ?></div>
			<!-- dugme + -->
			<div class='col-sm-1'>
				<p class='form-control-static'><a class='addfields' id="btn2"><i class='green fas fa-plus-square fa-2x'></i></a></p>
			</div>
		</div>

<?php

for ($i = 3; $i < 50; $i++) {
 ?>

<!-- sastojci / kolicina / jedinica mere <?php echo $i; ?> -->
		<div class="form-group row hidethis" id="set<?php echo $i; ?>">
			<label for='ingredients' class='col-sm-2 form-control-label'></label>
			<!-- sastojci -->
			<div class='col-sm-4'><?php echo $ingsAllOption; ?></div>
			<!-- kolicina -->
			<div class='col-sm-2'>
				<p class='form-control-static'><input type='number' class='form-control'  placeholder='Samo brojevi, npr. "300"...' ></p>
			</div>
			<!-- jedinica mere -->
			<div class='col-sm-2'><?php echo $unitsAllOption; ?></div>
			<!-- dugme + -->
			<div class='col-sm-1'>
				<p class='form-control-static'><a class='addfields' id='btn<?php echo $i; ?>'><i class='green fas fa-plus-square fa-2x'></i></a></p>
			</div>

		</div>

<?php
}
 ?>


		<!-- uputstvo za pravljenje -->
		<div  class="form-group row">
			<label class="col-sm-2 form-control-label">Uputstvo</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="10" class="summernote"  placeholder="Uputstvo za pripremu, po koracima..." ><strong>Korak 1</strong>:<br>bla bla..<br><br><strong>Korak 2</strong>:<br>bla bla..<br><br><strong>Korak 3</strong>:<br>bla bla..<br><br></textarea>
			</div>
		</div>

		<!-- kategorije -->
		<div  class="form-group row">
			<label for="cats" class="col-sm-2 form-control-label">Kategorije</label>
			<div class="col-sm-9">
				<select  class="select2" multiple="multiple">
					<?php
					foreach ($cats as $cat) {
						$catId = $cat['cat_id'];
						$catName = $cat['cat_name'];
						echo '<option value="'. $catId .'">'. $catName .'</option>';
					}
					 ?>
				</select>
			</div>
		</div>
	<br>
		<!-- galerija slika -->
		<div  class="form-group row">
			<label class="col-sm-2 form-control-label">Galerija slika</label>
			<div class="col-sm-9">
				<div class="box-typical box-typical-padding">
					<p class="form-control-static"><input type="text" class="form-control" id="search-keywords" placeholder='Pretraga po nazivu malim slovima, npr "američke palačinke"...' name="search-keywords"></p>
					<div id="keywords-warning"></div>
					<div id="result"></div>

				</div>
			</div>
		</div>

		<!-- submit -->
		<div class="text-center">
			<button type="text" class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form><br>
</div><!--.box-typical-->

<script>

var keyword = "";
var page = 1;

//polje za pretragu po kljucnim recima u naslovu recepta
$("#search-keywords").keyup(function(){
	var keyword = $(this).val();

             console.log(keyword);
             //console.log(jQuery.type(keyword));
	var x = keyword.length;
	if((x < 5) && (x > 0)){
	 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 5 i više slova' + "</div>");
	 	$("#result").text ("");
		var keyword = "";
	}else{
		$("#keywords-warning").text ("");
		var keyword = $(this).val();
		//$("#result").text ("ovde dodju slike kad ajax radi");
		//console.log(keyword);
		return ajax_call(keyword);
	 }

});

//dodavanje polja za unos namirnica, kolicina i jedinica mere
$(".addfields").click(function() {
	var btn = $(this).attr('id').slice(3);
	var btn = parseInt(btn);
	var btn = btn+1;
	$("#set" + btn).removeClass('hidethis');
	$(this).addClass('hidethis');
});




//ajax funkcija
function ajax_call(keyword) {
	if (    ((keyword == "") || (keyword == undefined) || (keyword == null))  ) {
		$("#result").text ("");
	}else{
		$.post("<?php echo ROOT_URL; ?>assets/ajaxPhotosRec.php", {keyword: keyword}, function(result){
            			$("#result").html(result);
    		});
	}
}

</script>


<?php




 ?>

  <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>






<?php
}


?>
