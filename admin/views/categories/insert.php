<?php
if(($superadmin || $admin || $editor) === true){

?>

<div class="box-typical box-typical-padding">				
	<h5 class="m-t-lg with-border text-center"><i class="font-icon color-green glyphicon glyphicon-bookmark"></i>&nbsp;&nbsp;&nbsp;<strong>Unos nove kategorije</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon color-green glyphicon glyphicon-bookmark"></i></h5><br>

	<form method="POST" action="<?php echo ROOT_URL; ?>/categories/insert" name="newcat">
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="catname" placeholder='Početno slovo mora biti veliko, npr. "Bez šećera"... ' name="catname"></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Permalink</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="catpermalink" name="catpermalink" placeholder='Permalink ne sme sadržati razmake, samo crtice "-", npr. "bez-secera"... '></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Fotografija</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="catphoto" name="catphoto" placeholder='Link fotografije, u obliku npr. "bezsecera.jpg"...' ></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Opis</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="6" class="summernote" id="catdescription" placeholder="Uneti kraći opis sadržaja ove kategorije..." name="catdescription"></textarea>
			</div>
			
		</div>
		<div class="text-center">
			<button type="submit" name="submit" value="submit" class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form>


</div><!--.box-typical-->












<?php
}elseif ($demo === true) {
?>
<div class="box-typical box-typical-padding">				
	<h5 class="m-t-lg with-border text-center"><i class="font-icon color-green glyphicon glyphicon-bookmark"></i>&nbsp;&nbsp;&nbsp;<strong>Unos nove kategorije</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon color-green glyphicon glyphicon-bookmark"></i></h5><br>

	<form>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" placeholder='Početno slovo mora biti veliko, npr. "Bez šećera"... '></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Permalink</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" placeholder='Permalink ne sme sadržati razmake, samo crtice "-", npr. "bez-secera"... '></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Fotografija</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" placeholder='Link fotografije, u obliku npr. "bezsecera.jpg"...' ></p>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Opis</label>
			<div class="col-sm-9 summernote-theme-1">
				<textarea rows="6" class="summernote" placeholder="Uneti kraći opis sadržaja ove kategorije..."></textarea>
			</div>
			
		</div>
		<div class="text-center">
			<button  class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form>
</div><!--.box-typical-->


<?php	
}


?>







