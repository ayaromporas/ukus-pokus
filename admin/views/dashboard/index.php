<?php                  

if(($superadmin || $admin || $editor) === true){
 ?>


<h1>Index Dashboard </h1>

<p>Ovde se nalazi opsti pregled sajta - broj komentara na cekanju, vazna obavestenja za sve superadmine, sve najcesce koriscene precice, okvirna statistika posecenosti sajta, i trenutni broj recepata, namirnica i kategorija.</p>

<section class="card mb-3">
	<header class="card-header text-center">
		Ubacivanje 2000 proizvoljnih recepata u bazu, u svrhe testiranja ponašanja sajta u produkciji		
	</header>
	<div class="card-block text-center">
		<form action="<?php echo ROOT_URL; ?>dashboard" name="testDB" method="POST">
			<input type="hidden" value="secure" name="secure">
			<button type="submit" name="insert" value="insert" class="btn btn-success btn-rounded">+ 10000</button>
		</form>
	</div>
</section>











<?php 

}elseif($demo === true){

 ?>


 <h1>Dobrodošli na Demo verziju Ukus Pokus Administracije</h1>

 <?php 

}


  ?>


