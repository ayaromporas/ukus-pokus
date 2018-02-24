<?php 

$ingredients = $viewmodel[0];  //spisak svih namirnica
$units = $viewmodel[1];  //spisak svih jedinica mere
$cats = $viewmodel[2];  //spisak svih kategorija


?>


<?php
if(($superadmin || $admin || $editor) === true){

?>

<div class="box-typical box-typical-padding">				
	<h5 class="m-t-lg with-border text-center"><i class="font-icon red fas fa-utensils"></i>&nbsp;&nbsp;&nbsp;<strong>Unos novog recepta</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon red fas fa-utensils"></i></h5><br>

	<form method="POST" action="<?php echo ROOT_URL; ?>recipes/insert" name="newrecipe" enctype="multipart/form-data">
		<input type="hidden" name="authorid" value="<?php echo $_SESSION['user_id'] ; ?>" >
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="recipetitle" placeholder='Početno slovo mora biti veliko, npr. "Američke palačinke"... ' name="recipetitle"></p>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Permalink</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="permalink" placeholder='Samo mala slova i crtice "-", npr. "americke-palacinke"... ' name="permalink"></p>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Kratak opis</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="6" class="summernote" id="description" placeholder="Kraći opis recepta u max. 2 rečenice..." name="description">Kraći opis recepta u max. 2 rečenice...</textarea>
			</div>
			
		</div>


		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Vreme pripreme</label>
			<div class="col-sm-3">
				<p class="form-control-static"><input type="number" class="form-control" id="preptime" name="preptime" placeholder='Samo brojevi, npr. "30"... '></p>
			</div>

			<label for="dirtydishes" class="col-sm-2 form-control-label">Isprljani sudovi</label>
			<div class="col-sm-3">
				<select id="dirtydishes" class="form-control" name="dirtydishes">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5 i više</option>
				</select>
			</div>		
		</div>


		<div class="form-group row">
			<label for="ingredients" class="col-sm-2 form-control-label">Sastojci, količina i jedinica mere</label>
			<div class="col-sm-4">
				<select id="ingredients" name="ingredients" class="select2">
<?php 
foreach ($ingredients as $ingredient) {

	$ingredientId = $ingredient['ingredient_id'];
	$ingredientName = $ingredient['ingredient_name'];

	echo '<option value="'. $ingredientId .'">'. $ingredientName .'</option>';
	
}
 ?>
				</select>
			</div>
			
			<div class="col-sm-2">
				<p class="form-control-static"><input type="number" class="form-control" id="ammount" name="ammount" placeholder='Samo brojevi, npr. "300"... '></p>
			</div>

			<div class="col-sm-2">
				<select id="units" name="units" class="select2">
<?php 
foreach ($units as $unit) {
	
	$unitId = $unit['unit_id'];
	$unitName = $unit['unit_name'];

	echo '<option value="'. $unitId .'">'. $unitName .'</option>';
	
}
 ?>
				</select>
			</div>
			<div class="col-sm-1">
				<p class="form-control-static" style="cursor: pointer;"><i class="green fas fa-plus-square fa-2x"></i></p>
			</div>

		</div>
		
		<div class="newinginsert"></div>
		

		<div  class="form-group row">
			<label class="col-sm-2 form-control-label">Uputstvo</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="10" class="summernote" id="instructions" placeholder="Uputstvo za pripremu, po koracima..." name="instructions"><strong>Korak 1</strong>:<br>bla bla..<br><br><strong>Korak 2</strong>:<br>bla bla..<br><br><strong>Korak 3</strong>:<br>bla bla..<br><br></textarea>
			</div>
			
		</div>

		<div  class="form-group row">
			<label for="cats" class="col-sm-2 form-control-label">Kategorije</label>
			<div class="col-sm-9">
				<select id="cats" name="cats[]" class="select2" multiple="multiple">
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


		<div  class="form-group row">
			<label class="col-sm-2 form-control-label">Slike</label>
			<div class="col-sm-4">
				<input type="file" name="photos" id="photos" ><label class="custom-file-label" for="photos">Choose file</label>
			</div>
			<div class="col-sm-1">
				<p class="form-control-static" style="cursor: pointer;"><i class="green fas fa-plus-square fa-2x"></i></p>
			</div>
			
		</div>
		<div class="newphotoinsert"></div>


			
		<div class="text-center">
			<button type="text" name="submit" value="submit" class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form>


</div><!--.box-typical-->



<?php 

if (isset($_POST['submit'])) {
	print_r($_POST);
}
echo '<br>';
print_r($_FILES);




 ?>








<?php
}elseif ($demo === true) {
?>




<?php	
}


?>






