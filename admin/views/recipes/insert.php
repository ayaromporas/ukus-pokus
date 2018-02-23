<?php
if(($superadmin || $admin || $editor) === true){

?>

<div class="box-typical box-typical-padding">				
	<h5 class="m-t-lg with-border text-center"><i class="font-icon red fas fa-utensils"></i>&nbsp;&nbsp;&nbsp;<strong>Unos novog recepta</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon red fas fa-utensils"></i></h5><br>

	<form method="POST" action="<?php echo ROOT_URL; ?>/recipes/insert" name="newrecipe">
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="recipetitle" placeholder='Početno slovo mora biti veliko, npr. "Američke palačinke"... ' name="recipetitle"></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Kratak opis</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="6" class="summernote" id="recipedescription" placeholder="Kraći opis recepta u max. 2 rečenice..." name="recipedescription"></textarea>
			</div>
			
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Vreme pripreme</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="number" class="form-control" id="preptime" name="preptime" placeholder='Samo brojevi, npr. "30"... '></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Id recepta kome pripada</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="photorecid" name="photorecid" placeholder='Isključivo brojevi, u obliku npr. "25"...' ></p>
			</div>
		</div>
	
		<div class="text-center">
			<button type="text" name="submit" value="submit" class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form>


</div><!--.box-typical-->












<?php
}elseif ($demo === true) {
?>

<div class="box-typical box-typical-padding">				
	<h5 class="m-t-lg with-border text-center"><i class="font-icon color-blue far fa-images"></i>&nbsp;&nbsp;&nbsp;<strong>Unos nove slike</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon color-blue far fa-images"></i></h5><br>

	<form>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" placeholder='Početno slovo mora biti malo, npr. "američke palačinke"... ' ></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Alt</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control"  placeholder='Početno slovo mora biti malo, npr. "američke palačinke"... ' ></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Link</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control"  placeholder='Samo mala slova, brojeve, crtice "-" i tačku ".", npr. "americke-palacinke.jpg"... '></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Id recepta kome pripada</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control"  placeholder='Isključivo brojevi, u obliku npr. "25"...' ></p>
			</div>
		</div>
	
		<div class="text-center">
			<button type="text" class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form>


</div><!--.box-typical-->


<?php	
}


?>







