<?php 

$ingredients = $viewmodel[0];  //spisak svih namirnica
$units = $viewmodel[1];  //spisak svih jedinica mere
$cats = $viewmodel[2];  //spisak svih kategorija

$ingsAllOption = "<select name='ingredients[]' class='select2'>";
foreach ($ingredients as $ingredient) {
	$id = $ingredient['ingredient_id'];
	$name = $ingredient['ingredient_name'];

	$ingsAllOption .= "<option value='" . $id . "'>" . $name . "</option>";	
}

$ingsAllOption .= "</select>";
//echo $ingsAllOption;

$unitsAllOption = "<select name='units[]' class='select2'>";
foreach ($units as $unit) {
	$id = $unit['unit_id'];
	$name = $unit['unit_name'];

	$unitsAllOption .= "<option value='" . $id . "'>" . $name . "</option>";	
}

$unitsAllOption .= "</select>";
//echo $unitsAllOption;





?>
 <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>

<?php
if(($superadmin || $admin || $editor) === true){

?>
<style>


</style>
<div class="box-typical box-typical-padding">				
	<h5 class="m-t-lg with-border text-center"><i class="font-icon red fas fa-utensils"></i>&nbsp;&nbsp;&nbsp;<strong>Unos novog recepta</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon red fas fa-utensils"></i></h5><br>


	<!-- forma za unos recepta -->
	<form method="POST" action="<?php echo ROOT_URL; ?>recipes/insert" name="newrecipe" enctype='multipart/form-data'>
		
		<!-- hidden, admin id -->
		<input type="hidden" name="authorid" value="<?php echo $_SESSION['user_id'] ; ?>" >
	
		<!-- naziv -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="recipetitle" placeholder='Početno slovo mora biti veliko, npr. "Američke palačinke"... ' name="recipetitle"></p>
			</div>
		</div>

		<!-- permalink -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Permalink</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="permalink" placeholder='Samo mala slova i crtice "-", npr. "americke-palacinke"... ' name="permalink"></p>
			</div>
		</div>
		
		<!-- kratak opis -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Kratak opis</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="6" class="summernote" id="description" placeholder="Kraći opis recepta u max. 2 rečenice..." name="description">Kraći opis recepta u max. 2 rečenice...</textarea>
			</div>
			
		</div>

		<!-- vreme pripreme -->
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Vreme pripreme</label>
			<div class="col-sm-3">
				<p class="form-control-static"><input type="number" class="form-control" id="preptime" name="preptime" placeholder='Samo brojevi, npr. "30"... '></p>
			</div>
			
			<!-- broj prljavih sudova -->
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
		
	
		<!-- sastojci / kolicina / jedinica mere 1 -->
		<div class="form-group row addafterthis">
			<label for='ingredients' class='col-sm-2 form-control-label'>Sastojci, količine i jedinice mere</label>
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
				<p class='form-control-static'><a class='addfields'><i class='green fas fa-plus-square fa-2x'></i></a></p>
			</div>
		</div>

		<!-- sastojci / kolicina / jedinica mere 2 -->
		<div class="form-group row addthis">
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
			<!-- <div class='col-sm-1'>
				<p class='form-control-static'><a class='addfields'><i class='green fas fa-plus-square fa-2x'></i></a></p>
			</div> -->
		</div><div class="here"></div>


			
				
		<!-- uputstvo za pravljenje -->
		<div  class="form-group row">
			<label class="col-sm-2 form-control-label">Uputstvo</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="10" class="summernote" id="instructions" placeholder="Uputstvo za pripremu, po koracima..." name="instructions"><strong>Korak 1</strong>:<br>bla bla..<br><br><strong>Korak 2</strong>:<br>bla bla..<br><br><strong>Korak 3</strong>:<br>bla bla..<br><br></textarea>
			</div>			
		</div>
		
		<!-- kategorije -->
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
	<br>
		<!-- galerija slika -->
		<div  class="form-group row">
			<label class="col-sm-2 form-control-label">Galerija slika</label>
			<div class="col-sm-9">
				<p>prikaz slika iz galerije, one koje su vec uploadovane</p>
			</div>			
		</div>	
	
		<!-- submit -->	
		<div class="text-center">
			<button type="text" name="submit" value="submit" class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form>
</div><!--.box-typical-->

<script>

var cloned;


$(".addfields").click(function() {
	//alert('hello');
	$('.addthis').addClass('original').clone().insertAfter('.here').addClass('cloned').removeClass('addthis');
});

</script>


<?php 



if(isset($_POST['submit'])){
	
	print_r($_POST);
	echo '<br>';
	
}	

 ?>

  <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>









<?php
}elseif ($demo === true) {
?>




<?php	
}


?>


