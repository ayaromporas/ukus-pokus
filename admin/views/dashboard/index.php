<h1>Dashboard</h1><hr><hr>


<div class="container">

    <div class="row text-center">
	  <div class="card bg-light mb-4 col-sm-4">
	  <div class="card-header">USERS</div>
	  <div class="card-body">
	    <h4 class="card-title">6</h4>
	    <p class="card-text"></p>
	  </div>
	</div>

	<div class="card bg-light mb-4 col-sm-4">
	  <div class="card-header">RECIPES</div>
	  <div class="card-body">
	    <h4 class="card-title">10</h4>
	    <p class="card-text"></p>
	  </div>
	</div>
	<div class="card bg-light mb-4 col-sm-4">
	  <div class="card-header">CAREGORI</div>
	  <div class="card-body">
	    <h4 class="card-title">17</h4>
	    <p class="card-text"></p>
	  </div>
	</div>

</div>
<?php

//var_dump($viewmodel);

foreach ($viewmodel[0][2] as $key => $vrednost) {
	echo $key. ' - - - - ' .$vrednost . '<br>';
}
echo "<br><br><br>";
foreach ($viewmodel[1][2] as $key => $vrednost) {
	echo $key. ' - - - - ' .$vrednost . '<br>';
}
echo "<br><br><br>";
foreach ($viewmodel[2][2] as $key => $vrednost) {
	echo $key. ' - - - - ' .$vrednost . '<br>';
}


?>
</div>
