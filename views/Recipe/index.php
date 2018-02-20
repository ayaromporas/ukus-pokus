<?php 
$recipemodel = new recipeModel();
$id = $recipemodel->getid();
if(($_GET['id']) == NULL){
	header('Location: ' . ROOT_URL); //preusmeravanje na pocetnu ako nema unetog id-ja
}
$recipe = $viewmodel[0];  //ceo recept ali samo iz tabele recepti
$categoriesAll = $viewmodel[1];  //sve kategorije kojima pripada ovaj recept, iz tabele kategorije
$ingrsMainArray = $viewmodel[2];  //svi sastojci iz tabela sastojci i jedinice mere
$commentsAll = $viewmodel[3];  //svi komentari koji su odobreni a pripadaju ovom receptu
$photosAll = $viewmodel[4];  //sve fotke koje pripadaju ovom receptu

$nrPhotos = count($photosAll);

?>

<!-- POCETAK STRANE -->
<div class="main">
    <div class="container bestRecipes">
          <br>
              <div class="col"><hr></div>
              <div class="col"><h1 class="text-center"><?php echo $recipe['recipe_title'] ?></h1></div>
              <div class="col"><hr></div>
          <br>
    </div>

<!-- Carousel -->
 <section id="carousel">
    <div class="row">
    	<div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
    		
    	      <div id="carouselRecipe" class="carousel slide" data-ride="carousel">
	            <ol class="carousel-indicators">
    		        <?php 
			for ($i = 0; $i < $nrPhotos; $i++) {
				if ($i == 0) {
				     echo '<li data-target="#carouselRecipe" data-slide-to="0" class="active"></li>';
				}else{
				      echo '<li data-target="#carouselRecipe" data-slide-to=" '. $i .' "></li>';
				}	
			}
		         ?>
	             </ol>

	         <div class="carousel-inner">
		<?php 

		for ($i = 0; $i < $nrPhotos; $i++) {
			if($i == 0){
				echo '<div class="carousel-item active"><img class="d-block w-100" src=" ' . ROOT_URL. 'assets/img/'. $photosAll[$i]['photo_link'] . ' " alt="'. $photosAll[$i]['photo_alt'] .'"></div>';
			}else{
				echo '<div class="carousel-item"><img class="d-block w-100" src=" ' . ROOT_URL. 'assets/img/'. $photosAll[$i]['photo_link'] . ' " alt="'. $photosAll[$i]['photo_alt'] .'"></div>';
			}
		}
		?>

	           </div>
	             <a class="carousel-control-prev" href="#carouselRecipe" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Prethodna</span>
		</a>
		<a class="carousel-control-next" href="#carouselRecipe" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Sledeća</span>
		</a>
	</div>

	<p class="mt-1 mb-1 mx-2"><em><?php echo $recipe['description']; ?></em></p>
         </div>
    </div>
     <div class="row"><!-- dugmici za kategorije ispod carousela --> 
    	<div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
		<?php 
		foreach ($categoriesAll as $category) {
			$name = $category['cat_name'];
			$id = $category['cat_id'];
			$link = $category['cat_permalink'];
			echo '<a href=" '. ROOT_URL . 'category/' . $id .'/' . $link . ' " class="btn btn-success btn-sm my-2 mx-2">'. $name .'</a>';
		}
		?>
    	</div>
     </div><!-- kraj dugmici za kategorije ispod carousela --> 
      <div class="row"><!-- dugmici za kategorije ispod carousela --> 
    	<div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
    		<div class="mx-2">
<?php 
$recipeRating = $recipe['avg_rating']. "";  
$nFullStars = $recipeRating[0]; 
$halfOrEmptyStar = $recipeRating[2];

if ($recipe['avg_rating'] < 5.0) {
  for ($e = 0; $e < $nFullStars; $e++) {
    echo '<img src="' . ROOT_URL . 'assets/img/zv-pu.png" alt="rejting" class="smallImg">';
  }
  if ($halfOrEmptyStar < 5) {
    echo '<img src="' . ROOT_URL . 'assets/img/zv-pr.png" alt="rejting" class="smallImg">';
  }elseif ($halfOrEmptyStar >= 5) {
    echo '<img src="' . ROOT_URL . 'assets/img/zv-po.png" alt="rejting" class="smallImg">';
  }
  for ($e = 0; $e < (4-$nFullStars); $e++) {
    echo '<img src="' . ROOT_URL . 'assets/img/zv-pr.png" alt="rejting" class="smallImg">';
  }

}elseif ($recipe['avg_rating'] == 5.0) {
  for ($e = 0; $e < 5; $e++) {
    echo '<img src="' . ROOT_URL . 'assets/img/zv-pu.png" alt="rejting" class="smallImg">';
  }
}
?>
		 &nbsp; <?php echo $recipe['avg_rating']; ?> &nbsp; (<?php echo $recipe['no_votes']; ?> &nbsp; glasova)<br>
		<img src="<?php echo ROOT_URL; ?>assets/img/sat.png" alt="vreme pripreme" class="smallImg"> &nbsp; <?php echo $recipe['prep_time']; ?> &nbsp; min<br>
		<img src="<?php echo ROOT_URL; ?>assets/img/posuda.png" alt="posuda" class="smallImg"> &nbsp; <?php echo $recipe['dirty_dishes']; ?> &nbsp; kom prljavog posuđa
                  </div>
    	</div>
      </div>
      <br>	
 </section><!-- kraj carousel i detalji ispod njega-->   	

<!-- Ispis sastojaka i uputstva-->
<section>
     <div class="notebook col-xs-12 col-sm-10 offset-sm-1">
     	<h1 class="subtitlesRec">Sastojci</h1>
 	<div class="row">
	    <div class="col-sm-6  justify-content-start d-flex flex-wrap">
	       <table class="table ingredients-table">
	       	<tbody>
<?php  
//print_r($ingrsMainArray);
$ni = count($ingrsMainArray); // $ni = number of ingredients

$i = 0;
while ($i < $ni) {
    $ingrName = $ingrsMainArray[$i][0]['ingredient_name'];
    $ammount = $ingrsMainArray[$i][1];
    $unit = $ingrsMainArray[$i][2]['unit_name'];
?>
			    <tr class="my-0">
			      <td class="my-0 pl-1 pr-2"><span class="text-uppercase"><?php echo $ingrName; ?></span></td>
			      <td class="my-0 pl-1 pr-2"><span><?php echo $ammount; ?></span></td>
			      <td class="my-0 pl-1 pr-2"><span><?php echo $unit; ?></span></td>
			    </tr>

<?php
    $i++;
}
?>
			  </tbody>
			</table>
		</div>
	</div>
     	<h1 class="subtitlesRec">Priprema</h1>
     	<div class="row">
     		<div class="col-md-10">
     			<p><?php echo $recipe['instructions']; ?></p>
     		</div>
     	</div>
     </div>
</section><!-- Ispis sastojaka -->
<div class="container bestRecipes">
      <br>
          <div class="col"><hr></div>
          <div class="col"><h2 class="text-center">Ocene i komentari</h2></div>
          <div class="col"><hr></div>
      <br>
</div>

<!-- Sekcija komentari - postavljanje i ispis -->
<section class="comments">
     <div class="row">
	<div class="col-md-8 offset-md-2 col-xs-10 offset-xs-1">
	      <div id="rating-form">
	      	<p class="mx-2"> Kako biste ocenili ovaj recept?</p>
		<div class="row">
			<div class="col-sm-7 text-left" id="rating-stars"> 
				<div class="cont">
				   <div class="stars">
				        <form method="POST" name="rating">
					  <input class="star star-5" id="star-5" type="radio" name="star" value="5">
					  <label class="star star-5" for="star-5"></label>
					  <input class="star star-4" id="star-4" type="radio" name="star" value="4">
					  <label class="star star-4" for="star-4"></label>
					  <input class="star star-3" id="star-3" type="radio" name="star" value="3">
					  <label class="star star-3" for="star-3"></label>
					  <input class="star star-2" id="star-2" type="radio" name="star" value="2">
					  <label class="star star-2" for="star-2"></label>
					  <input class="star star-1" id="star-1" type="radio" name="star" value="1">
					  <label class="star star-1" for="star-1"></label>
				          </form>
				      </div>
				 </div>				
			</div>
			<div class="col-sm-2 text-center">
				<button type="button" class="btn btn-success my-1" id="ratingsubmit" name="ratingsubmit">Pošalji</button>
			</div>
			<div class="text-center" id="ratingvalidation"></div>

		</div>
	      </div>
<script>

var rating = "";
var id = <?php echo $recipe['recipe_id']; ?>;

$("input[name='star']").click(function(){
	var rating = $("input[name='star']:checked").val();
	$("#ratingvalidation").text ("");
	//alert(rating);

});

$("#ratingsubmit").click(function(){
	var rating = $("input[name='star']:checked").val();
	if(rating == undefined){
		$("#ratingvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Niste označili nijednu ocenu' + "</div>");
	}else{
		$("#ratingvalidation").text ("");
		//alert(rating + "idemo");
		return ajax_call_rating(rating, id);
	}
});

//ajax funkcija
function ajax_call_rating (rating, id){
    $.post("<?php echo ROOT_URL; ?>assets/ajax4.php", {rating:rating, id: id}, function(result){
            $("div#rating-form").html(result);
    });
}

</script>

	       <hr>

	      <div id="comment-form">
	           <p class="mx-2"> Ispričajte nam kako je vama ispalo, da li ste nešto dodali ili drugačije uradili? Ideje za posluživanje i serviranje? Sa čim ste kombinovali?</p>
	      
	         <form method="POST" name="comments">

		<div class="form-group mx-2">
		    <!-- <label for="nameUser">Vaše ime</label> -->
		    <input type="text" class="form-control" id="nameUser" placeholder="Vaše ime..." required>
		  </div>

		<div class="form-group mx-2">
		    <!-- <label for="emailUser">Vaša email</label> -->
		    <input type="email" class="form-control" id="emailUser" aria-describedby="emailHelp" placeholder="Vaša email adresa..." required>
		    <small id="emailHelp" class="form-text text-muted">Nikada nećemo proslediti vaše podatke bilo kome, niti ih zloupotrebiti na bilo kakav način.</small>
		  </div>
		  <div class="form-group mx-2">
		    <textarea class="form-control" id="commentText" rows="3" name="commenttext" required></textarea>
		  </div>
		  <div>
		  	<input type="text" name="honeypot" id="honeypot">
		  </div>
		  <div class="form-group mx-2">
		       <button type="button" class="btn btn-success my-1" id="commentsubmit" name="commentsubmit">Pošalji</button>
		  </div>
		  <div class="text-center" id="namevalidation"></div>
		  <div class="text-center" id="emailvalidation"></div>
		  <div class="text-center" id="commentvalidation"></div>

	      </form>
	      </div>
	</div>
      </div>

      <hr class="mx-2">

       <!-- Prikaz komentara koji su odobreni -->
      <div class="row">
      	<div class="col-md-8 offset-md-2 col-xs-10 offset-xs-1">
<?php
foreach ($commentsAll as $comment) {
	$commentName = $comment['comment_name'];
	$commentDate = date_create($comment['comment_time']);	
	$commentDate = date_format($commentDate, "d.m.Y");			
	$commentText = $comment['comment_text'];			
?>	

      		<div class="card card-comments my-3 mx-2">
		  <div class="card-body">
		    <h5 class="card-title green cursive"><?php echo $commentName; ?></h5>
		    <h6 class="card-subtitle mb-2 text-muted"><strong><?php echo $commentDate; ?></strong></h6>
		    <p class="card-text"><?php echo $commentText; ?></p>
		  </div>
		</div>
<?php
}
?>		
      	</div>
      </div><!-- kraj prikaz komentara koji su odobreni -->
	<br>
	<br>
</section><!-- kraj sekcije komentari -->


    </div>
</div><!-- KRAJ STRANE -->



<script type="text/javascript">
var id = <?php echo $recipe['recipe_id']; ?>;	
var name = "";
var email = "";
var comment = "";
var hidden = "";

$("#nameUser").keyup(function(){
	var name = $(this).val();
	var probe = isLetters(name);
	console.log(probe);
	var x = name.length;
	if(x == 0){
		$("#namevalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za ime je obavezno' + "</div>");
	}
	if(x < 3){
		$("#namevalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ime mora imati 3 i više slova' + "</div>");
		var name = "";
	}else if(x > 50){
		$("#namevalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Ime je ograničeno na 50 karaktera' + "</div>");
		var name = "";
	}else if(x == 0){
		$("#namevalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za ime je obavezno' + "</div>");
	}else if(probe == false){
		$("#namevalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'U polje za ime možete uneti samo velika i mala slova, razmak i crtice' + "</div>");
	}else{
		$("#namevalidation").text ("");
		var name = $(this).val();
	}
});

$("#nameUser").focusout(function(){
	var name = $(this).val();
	var x = name.length;
	if(x == 0){
		$("#namevalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za ime je obavezno' + "</div>");
	}
});	

$("#emailUser").keyup(function(){
	var email = $(this).val();
	var test = isEmail(email);
	if(test == false){
		$("#emailvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Unesite ispravan email' + "</div>");
		var email = "";
	}else{
		var y = email.length;
		if(y > 50){
			$("#emailvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Email je ograničen na 50 karaktera' + "</div>");
		var email = "";
	             }else if(y == 0){
	             	$("#emailvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za email je obavezno' + "</div>");
	             }else{
		$("#emailvalidation").text ("");
		var email = $(this).val();
	             }
	}
 });

$("#emailUser").focusout(function(){
	var email = $(this).val();
	var y = email.length;
	if(y == 0){
	             	$("#emailvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za email je obavezno' + "</div>");
	             }
});

$("#commentText").keyup(function(){
	var comment = $(this).val();
	var z = comment.length;
	if(z > 3000){
		$("#commentvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Za komentar je predviđeno maksimalno 3000 karaktera' + "</div>");
		var comment = "";
	}else if(z == 0){
		$("#commentvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za komentar je obavezno' + "</div>");
		var comment = "";
	}else{
		$("#commentvalidation").text ("");	
		var comment = $(this).val();
	}
});

$("#commentText").focusout(function(){
	var comment = $(this).val();
	var z = comment.length;
	if(z == 0){
		$("#commentvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za komentar je obavezno' + "</div>");
	}

});


$("#commentsubmit").click(function(){

	var name = $('#nameUser').val();
	var email = $('#emailUser').val();
	var comment = $('#commentText').val();
	var hidden = $('#honeypot').val();

	if(name == ""){
		$("#namevalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za ime je obavezno' + "</div>");
	}
	if(email == ""){
		$("#emailvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za email je obavezno' + "</div>");
	}
	if(comment == ""){
		$("#commentvalidation").html ('<div class="alert alert-warning alert-dismissible fade show" role="alert">' + 'Polje za komentar je obavezno' + "</div>");
	}

	//poziv ajaxa ako je se u redu
	if(($("#namevalidation").text () == "") && ($("#emailvalidation").text () == "") && ($("#commentvalidation").text () == "") && (hidden == "") && (id != null) && (name != "") && (email != "") && (comment != "")){
		//alert(id + " " + name + " " + email + " " + comment + " " + hidden);
		return ajax_call(id, name, email, comment, hidden);
	}
		
});

//ajax funkcija
function ajax_call(id, name, email, comment, hidden) {             
    $.post("<?php echo ROOT_URL; ?>assets/ajax3.php", {id: id, name: name , email: email, comment: comment, hidden: hidden}, function(result){
            $("div#comment-form").html(result);
    });
}

//validacija emaila
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,10})$/;
  return regex.test(email);
}

//validacija imena
function isLetters(name) {
  var regex1 = /^[a-zA-Z šŠćĆčČđĐžŽ_-]+$/;
    return regex1.test(name);
}

</script>