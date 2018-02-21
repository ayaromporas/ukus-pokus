<?php
if(($superadmin || $admin || $editor) === true){

?>

<div class="box-typical box-typical-padding">

	<h5 class="m-t-lg with-border text-center"><i class="font-icon yellow fas fa-lemon"></i>&nbsp;&nbsp;&nbsp;<strong>Unos nove namirnice</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon yellow fas fa-lemon"></i></h5><br>

	<form method="POST" action="<?php echo ROOT_URL; ?>/ingredients/insert" name="newingr">
    <div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" id="ingname" placeholder='Početno slovo mora biti malo, npr. "kiselo mleko"... ' name="ingname"></p>
			</div>
    </div>

		<div class="text-center">
			<button type="submit" name="submit" value="submit" class="btn btn-rounded btn-success">Sačuvaj</button>
		</div>
	</form>


</div><!--.box-typical-->







<?php
} elseif ($demo === true) {
?>
<div class="box-typical box-typical-padding">
	<h5 class="m-t-lg with-border text-center"><i class="font-icon yellow fas fa-lemon"></i>&nbsp;&nbsp;&nbsp;<strong>Unos nove namirnice</strong>&nbsp;&nbsp;&nbsp;<i class="font-icon yellow fas fa-lemon"></i></h5><br>

	<form>

		<div class="form-group row">
			<label class="col-sm-2 form-control-label">Naziv</label>
			<div class="col-sm-9">
				<p class="form-control-static"><input type="text" class="form-control" placeholder='Početno slovo mora biti malo, npr. "kiselo mleko"... '></p>
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
