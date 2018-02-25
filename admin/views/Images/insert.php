<?php
if(($superadmin || $admin || $editor) === true){

?>

<div class="box-typical box-typical-padding">				
	<h5 class="m-t-lg with-border text-center"><i class="font-icon color-blue far fa-images"></i>&nbsp;&nbsp;&nbsp;<strong>Unos nove slike</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon color-blue far fa-images"></i></h5><br>

	<form method="POST" action="<?php echo ROOT_URL; ?>images/insert" name="newphoto">
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="photoname" placeholder='Početno slovo mora biti malo, npr. "američke palačinke"... ' name="photoname" required="required"></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Alt</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="photoalt" placeholder='Početno slovo mora biti malo, npr. "američke palačinke"... ' name="photoalt" required="required"></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Link</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="photolink" name="photolink" placeholder='Samo mala slova, brojeve, crtice "-" i tačku ".", npr. "americke-palacinke.jpg"... ' required="required"></p>
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







