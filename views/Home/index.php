<?php 

$ingredients = $viewmodel[0];  //spisak namirnica za punjenje select polja
$recipesPop = $viewmodel[1];  //najpopularniji recepti
$recipesLatest = $viewmodel[2];  //najnoviji recepti
$photosLatest = $viewmodel[3];  //naslovne fotke za poslednje recepte
$photosPop = $viewmodel[4]; //naslovne fotke za najpopularnije recepte

$a = 0; $b = 0; 
$x = 0;

?>

<!-- Form search -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>

<!-- Cover-->
<section id="cover">
  <div id="cover-caption">
    <div class="container">

    <div class="row">
      <div class="col-sm-10 offset-sm-1 text-center text-shadow-white" id="cover1"><br>
        <h1 class="display-4">Brzi i ukusni recepti</h1>
        <h1>za svaki dan i posebne prilike</h1>
        <br>
        <h4>Pretraga po namirnicama</h4>  

      </div>
   </div>

     <!-- Pretraga -->
      <div class="row text-center" id="cover2"><!-- pretraga -->
        <div class="col-sm-7 offset-sm-2 text-center" > <!-- polje za pretragu -->
          <form>
            <select class="form-control form-control-lg custom-select" multiple style="width: 100%" placeholder="U kući imam..." multiple="multiple">
              <?php
                // Izlistavanje sastojaka - za unos u pretragu
                foreach ($ingredients as $ingredient) {
                    echo '<option value="' . $ingredient['ingredient_id'] . '">' . $ingredient['ingredient_name'] . '</option>';
                }
                ?>
            </select> 
          </form>
  
          <small class="white text-shadow">Unesite prva dva slova namirnice, a zatim je izaberite iz padajućeg menija.</small><br><br>
        </div><!--kraj polje za pretragu -->

        <div class="col-sm-1 text-center" ><!--dugme za dodatne opcije -->
             <a class="btn btn-success mx-auto" data-toggle="collapse" href="#dodatneOpcije" aria-expanded="false" aria-controls="dodatneOpcije">Dodatne opcije</a><br><br>
        </div><!-- kraj dugme -->
       </div><!-- kraj pretraga -->
       <br><br>
      </div>
  </div>
</section><!-- kraj cover -->

<div class="main">

      <!-- Dodatne opcije koje se otvaraju na dugme -->
      <div class="collapse" id="dodatneOpcije"> 
          <div class="card">
           <div class="card-body">
            <h3 class="card-title text-center green">Dodatne opcije</h3>
      
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="17" name="cat" value="17">
                  <label class="custom-control-label" for="17">Manje od 15 min</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="8" name="cat" value="8">
                  <label class="custom-control-label" for="8">Za bebe</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="3" name="cat" value="3">
                  <label class="custom-control-label" for="3">Slatko</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="4" name="cat" value="4">
                  <label class="custom-control-label" for="4">Slano</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="18" name="cat" value="18">
                  <label class="custom-control-label" for="18">Posno</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="15" name="cat" value="15">
                  <label class="custom-control-label" for="15">Vegetarijansko</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="19" name="cat" value="19">
                  <label class="custom-control-label" for="19">Vegan</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="10" name="cat" value="10">
                  <label class="custom-control-label" for="10">Bez šećera</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="20" name="cat" value="20">
                  <label class="custom-control-label" for="20">Bez glutena</label>
                </div>
            </div>
            <div class="col-md-3  col-sm-6">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="7" name="cat" value="7">
                  <label class="custom-control-label" for="7">Za poneti</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="1" name="cat" value="1">
                  <label class="custom-control-label" for="1">U samo 1 posudi</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="16" name="cat" value="16">
                  <label class="custom-control-label" for="16">Egzotično</label>
                </div>
            </div>
          </div>
  
            </div>
          </div>
      </div> <!--kraj dodatne opcije div-a -->


     <!-- Prikaz rezultata Ajax pretrage ako ih ima-->
     <div id="result">
     </div> <!-- Kraj prikaza rezultata pretrage -->

     <!-- Najpopularniji recepti, poslednjih 6 -->
     <section id="recipesPop">      
       <div class="bestRecipes">
         <div class="container">
            <br>
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

</div><!-- kraj main -->


<!-- jQuery for search field -->

<script type="text/javascript">

  var select_val;  
  var checkbox;
  var page;

$("select").select2({            //select2 
  minimumInputLength: 1,
  placeholder: 'Unesite namirnice koje želite da upotrebite',
  language: {
       inputTooShort: function () {
       return 'Krenite da kucate...';
       },
      noResults: function () {
       return 'Nije pronađen nijedan rezultat';
      },
     }
});

$("select").on("select2:select", function (evt) {
  
  select_val = $(evt.currentTarget).val();
 if(select_val != null && select_val !=""){ 

    var n = $(".custom-control-input:checked").length;
        if (n > 0){
            checkbox =[];
            $(".custom-control-input:checked").each(function(){
                checkbox.push($(this).val());
            });
        }
    return ajax_call(select_val, checkbox, page);
 }
});

$("select").on("select2:unselect", function (evt) {
    select_val = $(evt.currentTarget).val();
    checkbox =[];
    $(".custom-control-input:checked").each(function(){    
               checkbox.push($(this).val());
          });

 if((select_val ==null || select_val =="") && (checkbox =="" || checkbox ==null)){
      $("div#result").text("");
  } else {
       return ajax_call(select_val, checkbox, page); 
  }
});

$(".custom-control-input").click(function(){
      checkbox =[];
     $(".custom-control-input:checked").each(function(){
                checkbox.push($(this).val());
            });
      select_val = $("select").val();

  if((select_val ==null || select_val =="") && (checkbox =="" || checkbox ==null)){

      $("div#result").text("");
  } else {        
          return ajax_call(select_val, checkbox, page);        
      }     
});

function pagination(page){
      var page = parseInt(page) ;

      select_val = $("select").val();
      checkbox =[];
      $(".custom-control-input:checked").each(function(){    
                checkbox.push($(this).val());
        });  

     return ajax_call(select_val, checkbox, page); 
}

//ajax funkcija
 function ajax_call(select_val, checkbox, page) {             
    $.post("<?php echo ROOT_URL; ?>assets/ajax.php", {data: select_val , cat: checkbox, page: page}, function(result){
            $("div#result").html(result);
    });
    return select_val = [];
}

//zadrzavanje vrednosti nakon dugmeta Back
$(document).ready(function(){
       checkbox =[];
       $(".custom-control-input:checked").each(function(){
            checkbox.push($(this).val());
       });
       select_val = $("select").val();
       if((select_val ==null || select_val =="") && (checkbox =="" || checkbox ==null)){
            $("div#result").text("");
       } else {  
            return ajax_call(select_val, checkbox, page);        
      }     
});


</script>



