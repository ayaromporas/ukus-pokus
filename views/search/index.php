<?php

$ingredients = $viewmodel[0];  //spisak namirnica za punjenje select polja
$categoriesAll = $viewmodel[1];  //spisak kategorija za punjenje checkboxova

$recipesPop = $viewmodel[2];  //najpopularniji recepti
$recipesLatest = $viewmodel[3];  //najnoviji recepti
$photosLatest = $viewmodel[4];  //naslovne fotke za poslednje recepte
$photosPop = $viewmodel[5]; //naslovne fotke za najpopularnije recepte
?>



<!-- pocetak strane -->
<div class="main">
    <div class="container bestRecipes">
          <br>
              <div class="col"><hr></div>
              <div class="col"><h2 class="text-center display-4">Napredna pretraga </h2></div>
              <div class="col"><hr></div>
          <br>

          <!-- main row za celu stranu-->
          <div class="row">
            <div class="col-md-4"><!-- kolona u kojoj se nalaze sve pretrage-->


              <h5 class="search-title">Odaberite sastojke &nbsp;&nbsp;&nbsp;
                    <a data-toggle="collapse" href="#naprednaPretraga1" role="button" aria-expanded="true" aria-controls="naprednaPretraga1"><i class="fas fa-angle-down"></i></a>
               </h5>
                      <div id="naprednaPretraga1" class="collapse.show">
                        <div class="card card-body search-card px-0 py-1 m-0">
                            <form>
                                <select class="form-control form-control-lg custom-select" class="form-control"multiple style="width: 100%" placeholder="U kući imam..." multiple="multiple"  id="search-ingr">
                                  <?php
                                    // Izlistavanje sastojaka - za unos u pretragu
                                    foreach ($ingredients as $ingredient) {
                                        echo '<option value="' . $ingredient['ingredient_id'] . '">' . $ingredient['ingredient_name'] . '</option>';
                                    }
                                    ?>
                              </select>
                          </form>
                          <small class="text-left">Unesite prva dva slova namirnice, a zatim je izaberite iz padajućeg menija.</small>
                        </div>
                      </div>
              <hr> <h5 class="search-title">Pretraga po naslovu &nbsp;&nbsp;&nbsp;
                    <a data-toggle="collapse" href="#naprednaPretraga2" role="button" aria-expanded="true" aria-controls="naprednaPretraga2"><i class="fas fa-angle-down"></i></a>
               </h5>
                      <div class="collapse.show" id="naprednaPretraga2">
                        <div class="card card-body search-card px-0 py-1 m-0">
                            <form>
                                <input type="text" class="form-control" id="search-keywords" name="search-keywords" placeholder='Npr. "sos", "pita"... '>
                          </form>
                          <small class="text-left">Unesite reči koje se mogu nalaziti u naslovu recepta.</small>  <br>
                          <div id="keywords-warning"></div>
                        </div>
                      </div>
              <hr>
              <div data-toggle="collapse" href="#naprednaPretraga3" role="button" aria-expanded="true" aria-controls="naprednaPretraga3" class="pointerClass">
                <h5 class="search-title">Pretraga po rejtingu &nbsp;&nbsp;&nbsp;
                    <i class="fas fa-angle-down"></i>
                </h5>
              </div>
                      <div class="collapse" id="naprednaPretraga3">
                        <div class="card card-body search-card px-0 py-1 m-0">

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="star5" value="5" name="rating">
                            <label class="custom-control-label" for="star5">5 zvezdica</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="star4" value="4" name="rating">
                            <label class="custom-control-label" for="star4">4 zvezdice</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="star3" value="3" name="rating">
                            <label class="custom-control-label" for="star3">3 zvezdice</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="star2" value="2" name="rating">
                            <label class="custom-control-label" for="star2">2 zvezdice</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="star1" value="1" name="rating">
                            <label class="custom-control-label" for="star1">1 zvezdica</label>
                          </div>

                        </div>
                      </div>

            <hr>
            <div data-toggle="collapse" href="#naprednaPretraga4" role="button" aria-expanded="true" aria-controls="naprednaPretraga4" class="pointerClass">
                <h5 class="search-title">Vreme pripreme &nbsp;&nbsp;&nbsp;
                    <i class="fas fa-angle-down"></i>
                  </h5>
              </div>

                      <div class="collapse" id="naprednaPretraga4">
                        <div class="card card-body search-card px-0 py-1 m-0">

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="BETWEEN 0 AND 14" value="BETWEEN 0 AND 14" name="preptime">
                            <label class="custom-control-label" for="BETWEEN 0 AND 14">manje od 15 min</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="BETWEEN 15 AND 29" value="BETWEEN 15 AND 29" name="preptime">
                            <label class="custom-control-label" for="BETWEEN 15 AND 29">15 - 30 min</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="BETWEEN 30 AND 44" value="BETWEEN 30 AND 44" name="preptime">
                            <label class="custom-control-label" for="BETWEEN 30 AND 44">30 - 45 min</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="BETWEEN 45 AND 59" value="BETWEEN 45 AND 59" name="preptime">
                            <label class="custom-control-label" for="BETWEEN 45 AND 59">45 - 60 min</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="BETWEEN 60 AND 119" value="BETWEEN 60 AND 119" name="preptime">
                            <label class="custom-control-label" for="BETWEEN 60 AND 119">60 - 120 min</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="BETWEEN 120 AND 600" value="BETWEEN 120 AND 600" name="preptime">
                            <label class="custom-control-label" for="BETWEEN 120 AND 600">više od 120 min</label>
                          </div>

                        </div>
                      </div>

            <hr>
            <div data-toggle="collapse" href="#naprednaPretraga5" role="button" aria-expanded="true" aria-controls="naprednaPretraga5" class="pointerClass">
                <h5 class="search-title">Koliko prljavih sudova? &nbsp;&nbsp;&nbsp;
                    <i class="fas fa-angle-down"></i>
                  </h5>
              </div>

                      <div class="collapse" id="naprednaPretraga5">
                        <div class="card card-body search-card px-0 py-1 m-0">

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="dish1" value="1" name="dishes">
                            <label class="custom-control-label" for="dish1">1 posuda</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="dish2" value="2" name="dishes">
                            <label class="custom-control-label" for="dish2">2 posude</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="dish3" value="3" name="dishes">
                            <label class="custom-control-label" for="dish3">3 posude</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="dish4" value="4" name="dishes">
                            <label class="custom-control-label" for="dish4">4 posude</label>
                          </div>

                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="dish5" value="5" name="dishes">
                            <label class="custom-control-label" for="dish5">5 i više posuda</label>
                          </div>

                        </div>
                      </div>

              <hr>
            <div data-toggle="collapse" href="#naprednaPretraga6" role="button" aria-expanded="true" aria-controls="naprednaPretraga6" class="pointerClass">
                <h5 class="search-title">Odaberite kategorije &nbsp;&nbsp;&nbsp;
                      <i class="fas fa-angle-down"></i>
                 </h5>
               </div>
                    <div class="collapse" id="naprednaPretraga6">
                      <div class="card card-body search-card px-0 py-1 m-0">

			<?php
			foreach ($categoriesAll as $category) {
			?>
		                          <div class="custom-control custom-checkbox">
		                            <input type="checkbox" class="custom-control-input" id="cat<?php echo $category['cat_id']; ?>" value="<?php echo $category['cat_id']; ?>" name="cat">
		                            <label class="custom-control-label" for="cat<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></label>
		                          </div>
			 <?php
			}
			?>
                        </div>
                      </div>
                      <br><br>

            </div>
            <div class="col-md-8"><!-- kolona u kojoj se nalaze svi rezultati-->

	     <!-- Prikaz rezultata Ajax pretrage ako ih ima-->
	     <div id="result">
	     </div> <!-- Kraj prikaza rezultata pretrage -->

	     <!-- Najpopularniji recepti, poslednjih 6 -->
<section id="recipesPop">
       <div class="bestRecipes">
         <div class="container">
              <div class="col"></div>
              <div class="col"><h2 class="text-center greentitle">Najbolje ocenjeni</h2></div>
              <div class="col"></div>
            <br>

              <div class="row">

                <?php  for ($i = 0; $i < 6; $i++) : ?>

                <?php

                  $recipeRating = $recipesPop[$i]['avg_rating']. "";
                  $nFullStars = $recipeRating[0];
                  $halfOrEmptyStar = $recipeRating[2];

                 ?>

                      <div class="col-md-4">
                        <div class="card card-recipes">
                          <div class="double"><a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipesPop[$i]['recipe_id']; ?>/<?php echo $recipesPop[$i]['recipe_permalink']; ?>"><h5 class="card-title text-center"><?php echo $recipesPop[$i]['recipe_title']; ?></h5></a></div>
                          <a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipesPop[$i]['recipe_id']; ?>/<?php echo $recipesPop[$i]['recipe_permalink']; ?>">
                            <img class="card-img-top" src="assets/img/<?php echo $photosPop[$i]['photo_link']; ?>" alt="<?php echo $photosPop[$i]['photo_alt']; ?>">
                          </a>

                          <p>
			<?php

			if ($recipesPop[$i]['avg_rating'] < 5.0) {
			  for ($e = 0; $e < $nFullStars; $e++) {
			    echo '<img src="assets/img/zv-pu.png" alt="rejting" class="smallImg">';
			  }
			  if ($halfOrEmptyStar < 5) {
			    echo '<img src="assets/img/zv-pr.png" alt="rejting" class="smallImg">';
			  }elseif ($halfOrEmptyStar >= 5) {
			    echo '<img src="assets/img/zv-po.png" alt="rejting" class="smallImg">';
			  }
			  for ($e = 0; $e < (4-$nFullStars); $e++) {
			    echo '<img src="assets/img/zv-pr.png" alt="rejting" class="smallImg">';
			  }

			}elseif ($recipesPop[$i]['avg_rating'] == 5.0) {
			  for ($e = 0; $e < 5; $e++) {
			    echo '<img src="assets/img/zv-pu.png" alt="rejting" class="smallImg">';
			  }
			}
			?>

                             &nbsp; <?php echo $recipesPop[$i]['avg_rating']; ?> &nbsp; (<?php echo $recipesPop[$i]['no_votes']; ?> &nbsp; glasova)<br>
                           <img src="assets/img/sat.png" alt="vreme pripreme" class="smallImg"> &nbsp; <?php echo $recipesPop[$i]['prep_time']; ?> &nbsp; min<br>
                           <img src="assets/img/posuda.png" alt="posuda" class="smallImg"> &nbsp; <?php echo $recipesPop[$i]['dirty_dishes']; ?> &nbsp; kom prljavog posuđa
                         </p>
                        </div>
                       </div>

                <?php endfor; ?>

           </div><!--kraj row -->
         </div>
       </div>
     </section> <!-- kraj najpopularniji recepti -->


     <!-- Najnoviji recepti, poslednjih 6 -->
     <section id="recipesLatest">
       <div class="bestRecipes">
         <div class="container">
            <br>
              <div class="col"></div>
              <div class="col"><h2 class="text-center greentitle">Najnoviji recepti</h2></div>
              <div class="col"></div>
            <br>
           <div class="row">

                <?php  for ($i = 0; $i < 6; $i++) : ?>

                <?php

                  $recipeRating = $recipesPop[$i]['avg_rating']. "";
                  $nFullStars = $recipeRating[0];
                  $halfOrEmptyStar = $recipeRating[2];

                 ?>

                      <div class="col-md-4">
                        <div class="card  card-recipes">
                          <div class="double"><a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipesLatest[$i]['recipe_id']; ?>/<?php echo $recipesLatest[$i]['recipe_permalink']; ?>">
                            <h5 class="card-title text-center"><?php echo $recipesLatest[$i]['recipe_title']; ?></h5>
                          </a></div>
                          <a href="<?php echo ROOT_URL; ?>recipe/<?php echo $recipesLatest[$i]['recipe_id']; ?>/<?php echo $recipesLatest[$i]['recipe_permalink']; ?>">
                            <img class="card-img-top" src="assets/img/<?php echo $photosLatest[$i]['photo_link']; ?>" alt="<?php echo $photosLatest[$i]['photo_alt']; ?>">
                          </a>

                          <p>
			<?php

			if ($recipesLatest[$i]['avg_rating'] < 5.0) {
			  for ($e = 0; $e < $nFullStars; $e++) {
			    echo '<img src="assets/img/zv-pu.png" alt="rejting" class="smallImg">';
			  }
			  if ($halfOrEmptyStar < 5) {
			    echo '<img src="assets/img/zv-pr.png" alt="rejting" class="smallImg">';
			  }elseif ($halfOrEmptyStar >= 5) {
			    echo '<img src="assets/img/zv-po.png" alt="rejting" class="smallImg">';
			  }
			  for ($e = 0; $e < (4-$nFullStars); $e++) {
			    echo '<img src="assets/img/zv-pr.png" alt="rejting" class="smallImg">';
			  }

			}elseif ($recipesLatest[$i]['avg_rating'] == 5.0) {
			  for ($e = 0; $e < 5; $e++) {
			    echo '<img src="assets/img/zv-pu.png" alt="rejting" class="smallImg">';
			  }
			}
			?>

                            &nbsp; <?php echo $recipesLatest[$i]['avg_rating']; ?> &nbsp; (<?php echo $recipesLatest[$i]['no_votes']; ?> &nbsp; glasova)<br>
                           <img src="assets/img/sat.png" alt="vreme pripreme" class="smallImg"> &nbsp; <?php echo $recipesLatest[$i]['prep_time']; ?> &nbsp; min<br>
                           <img src="assets/img/posuda.png" alt="posuda" class="smallImg"> &nbsp; <?php echo $recipesLatest[$i]['dirty_dishes']; ?> &nbsp; kom prljavog posuđa</p>
                        </div>
                       </div>

                <?php endfor; ?>

           </div><!--kraj row -->
            <br>
         </div>
       </div>
     </section> <!-- kraj najnoviji recepti -->

            </div>

          </div> <!-- kraj main row-->

    </div><!-- kraj container -->
</div><!-- kraj main -->




<!-- jQuery for search  -->

<script type="text/javascript">

  var select_val;
  var keyword = "";
  var rating = "";
  var preptime = "";
  var dishes = "";
  var cat = "";
  var page;

//select polje, osnovni kod
$("select").select2({
  minimumInputLength: 1,
  placeholder: 'Sastojci...',
  language: {
       inputTooShort: function () {
       return 'Krenite da kucate...';
       },
      noResults: function () {
       return 'Nije pronađen nijedan rezultat';
      },
     }
});

//select polje kad se cekira neka namirnica
$("select").on("select2:select", function (evt) {

      var select_val = $(evt.currentTarget).val();

      var keyword = $("#search-keywords").val();
      var x = keyword.length;
      if((x < 3) && (x > 0)){
	 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 3 i više slova' + "</div>");
	 	$("#result").text ("");
		var keyword = "";
      }else{
		$("#keywords-warning").text ("");
		var select_val = $("select").val();
		var keyword = $("#search-keywords").val();
		var rating = [];
		$("[name='rating']:checked").each(function(){
	                rating.push($(this).val());
	            });
		var preptime = [];
		$("[name='preptime']:checked").each(function(){
	                preptime.push($(this).val());
	            });
		var dishes = [];
		$("[name='dishes']:checked").each(function(){
	                dishes.push($(this).val());
	            });
		var cat = [];
		$("[name='cat']:checked").each(function(){
	                cat.push($(this).val());
	            });
		console.log(select_val, keyword, rating, preptime, dishes, cat, page);
		return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
       }

});


//select polje kad se odcekira namirnica
$("select").on("select2:unselect", function (evt) {

      var select_val = $(evt.currentTarget).val();

      var keyword = $("#search-keywords").val();
      var x = keyword.length;
      if((x < 3) && (x > 0)){
	 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 3 i više slova' + "</div>");
	 	$("#result").text ("");
		var keyword = "";
      }else{
		$("#keywords-warning").text ("");
		var select_val = $("select").val();
		var keyword = $("#search-keywords").val();
		var rating = [];
		$("[name='rating']:checked").each(function(){
	                rating.push($(this).val());
	            });
		var preptime = [];
		$("[name='preptime']:checked").each(function(){
	                preptime.push($(this).val());
	            });
		var dishes = [];
		$("[name='dishes']:checked").each(function(){
	                dishes.push($(this).val());
	            });
		var cat = [];
		$("[name='cat']:checked").each(function(){
	                cat.push($(this).val());
	            });
		console.log(select_val, keyword, rating, preptime, dishes, cat, page);
		return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
       }
 });


//polje za pretragu po kljucnim recima u naslovu recepta
$("#search-keywords").keyup(function(){
	var keyword = $(this).val();

             console.log(select_val, keyword, rating, preptime, dishes, cat, page);
             //console.log(jQuery.type(keyword));
	var x = keyword.length;
	if((x < 3) && (x > 0)){
	 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 3 i više slova' + "</div>");
	 	$("#result").text ("");
		var keyword = "";
	}else{
		$("#keywords-warning").text ("");
		var select_val = $("select").val();
		var keyword = $(this).val();
		var rating = [];
		$("[name='rating']:checked").each(function(){
	                rating.push($(this).val());
	            });
		var preptime = [];
		$("[name='preptime']:checked").each(function(){
	                preptime.push($(this).val());
	            });
		var dishes = [];
		$("[name='dishes']:checked").each(function(){
	                dishes.push($(this).val());
	            });
		var cat = [];
		$("[name='cat']:checked").each(function(){
	                cat.push($(this).val());
	            });
		console.log(select_val, keyword, rating, preptime, dishes, cat, page);
		return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
	 }

});

//rating checkboxovi
$("[name='rating']").click(function(){

	var rating = [];
	$("[name='rating']:checked").each(function(){
                rating.push($(this).val());
            });

	var keyword = $("#search-keywords").val();
      	var x = keyword.length;
	      if((x < 3) && (x > 0)){
		 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 3 i više slova' + "</div>");
	 		$("#result").text ("");
			var keyword = "";
	      }else{
			$("#keywords-warning").text ("");

			var select_val = $("select").val();
			var keyword = $("#search-keywords").val();
			var preptime = [];
			$("[name='preptime']:checked").each(function(){
		                preptime.push($(this).val());
		            });
			var dishes = [];
			$("[name='dishes']:checked").each(function(){
		                dishes.push($(this).val());
		            });
			var cat = [];
			$("[name='cat']:checked").each(function(){
		                cat.push($(this).val());
		            });
			console.log(select_val, keyword, rating, preptime, dishes, cat, page);
			return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
	       }

});

//preptime checkboxovi
$("[name='preptime']").click(function(){

	var preptime = [];
	$("[name='preptime']:checked").each(function(){
                preptime.push($(this).val());
            });

	var keyword = $("#search-keywords").val();
      	var x = keyword.length;
	      if((x < 3) && (x > 0)){
		 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 3 i više slova' + "</div>");
	 		$("#result").text ("");
			var keyword = "";
	      }else{
			$("#keywords-warning").text ("");

			var select_val = $("select").val();
			var keyword = $("#search-keywords").val();
			var rating = [];
			$("[name='rating']:checked").each(function(){
		                rating.push($(this).val());
		            });
			var dishes = [];
			$("[name='dishes']:checked").each(function(){
		                dishes.push($(this).val());
		            });
			var cat = [];
			$("[name='cat']:checked").each(function(){
		                cat.push($(this).val());
		            });
			console.log(select_val, keyword, rating, preptime, dishes, cat, page);
			return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
	       }
});

//dishes checkboxovi
$("[name='dishes']").click(function(){

	var dishes = [];
	$("[name='dishes']:checked").each(function(){
                dishes.push($(this).val());
            });

	var keyword = $("#search-keywords").val();
      	var x = keyword.length;
	      if((x < 3) && (x > 0)){
		 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 3 i više slova' + "</div>");
	 		$("#result").text ("");
			var keyword = "";
	      }else{
			$("#keywords-warning").text ("");
			var select_val = $("select").val();
			var keyword = $("#search-keywords").val();
			var rating = [];
			$("[name='rating']:checked").each(function(){
		                rating.push($(this).val());
		            });
			var preptime = [];
			$("[name='preptime']:checked").each(function(){
		                preptime.push($(this).val());
		            });
			var cat = [];
			$("[name='cat']:checked").each(function(){
		                cat.push($(this).val());
		            });
			console.log(select_val, keyword, rating, preptime, dishes, cat, page);
			return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
	       }
});

//cat checkboxovi
$("[name='cat']").click(function(){

	var cat = [];
	$("[name='cat']:checked").each(function(){
                cat.push($(this).val());
            });

	var keyword = $("#search-keywords").val();
      	var x = keyword.length;
	      if((x < 3) && (x > 0)){
		 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 3 i više slova' + "</div>");
	 		$("#result").text ("");
			var keyword = "";
	      }else{
			$("#keywords-warning").text ("");

			var select_val = $("select").val();
			var keyword = $("#search-keywords").val();
			var rating = [];
			$("[name='rating']:checked").each(function(){
		                rating.push($(this).val());
		            });
			var preptime = [];
			$("[name='preptime']:checked").each(function(){
		                preptime.push($(this).val());
		            });
			var dishes = [];
			$("[name='dishes']:checked").each(function(){
		                dishes.push($(this).val());
		            });
			console.log(select_val, keyword, rating, preptime, dishes, cat, page);
			return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
	       }
});




//ajax funkcija
function ajax_call(select_val, keyword, rating, preptime, dishes, cat, page) {
	if (    ((select_val == null) || (select_val == "") || (select_val == undefined)) && ((keyword == "") || (keyword == undefined) || (keyword == null)) && ((rating == "") || (rating == null) || (rating == undefined)) && ((preptime == "") || (preptime == null) || (preptime == undefined)) && ((dishes == "") || (dishes == null) || (dishes == undefined)) && ((cat == "") || (cat == null) || (cat == undefined))  ) {
		$("#result").text ("");
	}else{
		$.post("<?php echo ROOT_URL; ?>assets/ajax2.php", {data: select_val, keyword: keyword, rating: rating, preptime: preptime, dishes: dishes, cat:cat, page:page}, function(result){
            			$("#result").html(result);
    		});
	}

}

//paginacija
function pagination(page){
      var page = parseInt(page);

	var select_val = $("select").val();
	var keyword = $("#search-keywords").val();
	var rating = [];
	$("[name='rating']:checked").each(function(){
	            rating.push($(this).val());
	        });
	var preptime = [];
	$("[name='preptime']:checked").each(function(){
	            preptime.push($(this).val());
	        });
	var dishes = [];
	$("[name='dishes']:checked").each(function(){
	            dishes.push($(this).val());
	        });
	var cat = [];
	$("[name='cat']:checked").each(function(){
	            cat.push($(this).val());
	        });

      return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
}

// //zadrzavanje vrednosti nakon dugmeta Back
$(document).ready(function(){

	var keyword = $("#search-keywords").val();
      	var x = keyword.length;
	      if((x < 3) && (x > 0)){
		 	$("#keywords-warning").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Potrebno je uneti 3 i više slova' + "</div>");
	 		$("#result").text ("");
			var keyword = "";
	      }else{
			$("#keywords-warning").text ("");
			var select_val = $("select").val();
			var keyword = $("#search-keywords").val();
			var rating = [];
			$("[name='rating']:checked").each(function(){
		                rating.push($(this).val());
		            });
			var preptime = [];
			$("[name='preptime']:checked").each(function(){
		                preptime.push($(this).val());
		            });
			var dishes = [];
			$("[name='dishes']:checked").each(function(){
		                dishes.push($(this).val());
		            });
			var cat = [];
			$("[name='cat']:checked").each(function(){
		                cat.push($(this).val());
		            });
			console.log(select_val, keyword, rating, preptime, dishes, cat, page);
			return ajax_call(select_val, keyword, rating, preptime, dishes, cat, page);
	       }
});


 </script>
