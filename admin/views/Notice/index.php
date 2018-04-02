
<div class="box-typical box-typical-padding">
	<h5 class="m-t-lg with-border text-center"><i class="fas color-yellow fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;<strong>Obaveštenje svim administratorima</strong>&nbsp;&nbsp;&nbsp;<i class="fas color-yellow fa-exclamation-triangle"></i></h5><br>


	<!-- forma za unos recepta -->
	<form method="POST" action="<?php echo ROOT_URL; ?>notice" name="newnotice" enctype='multipart/form-data'>

		<!-- hidden, admin id -->
		<input type="hidden" name="author_id" value="<?php echo $_SESSION['user_id'] ; ?>" >
		<input type="hidden" name="author_name" value="<?php echo $_SESSION['user_name'] ; ?>" >

		<!-- naziv -->
		<div class="form-group row">
			<label class="col-sm-1 form-control-label">Naslov</label>
			<div class="col-sm-8">
				<p class="form-control-static"><input type="text" class="form-control" id="notice_title" placeholder='Unesite naslov' name="notice_title"></p>
			</div>
		</div>

		<!-- uputstvo za pravljenje -->
		<div  class="form-group row">
			<label class="col-sm-1 form-control-label">Opis</label>
			<div class="col-sm-10 summernote-theme-1">
				<textarea rows="10" class="summernote" id="notice_body" placeholder="Opis problema tj. tekst poruke za administratore" name="notice_body"></textarea>
			</div>
		</div>

		<!-- submit -->
		<div class="text-center">
			<button type="text" name="submit" value="submit" class="btn btn-rounded btn-success">Pošalji poruku</button>
		</div>
	</form><br>
</div><!--.box-typical-->
