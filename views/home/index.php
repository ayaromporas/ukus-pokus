<?php
$homemodel = new HomeModel();
$queryInstance = new Query();

// upit za dobijanje sastojaka za upis u formu za pretragu
 $ingrRows = $homemodel->ingredients();

//upit za dobijanje svih kategorija
$query = "";
$catsAll = $queryInstance->allRows("categories",$query);

?>

      <!-- Form search -->
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>

<!-- POCETAK STRANE -->
   <div class="cover"><!-- cover slika i pretraga--> 

    <!-- Naslov -->
    <div class="row">
       <div class="col-12 text-center"><br>
         <h1 class="white text-shadow">Brzi i ukusni recepti</h1>
         <h1 class="white text-shadow">za svaki dan</h1><br><br>
         <h2 class="white text-shadow">Pretraga po namirnicama</h2><br>
       </div>
     </div><!-- naslov kraj -->
     
     <!-- Pretraga -->
<!--      <div class="row">
          <div class="col-12 text-center">
               
          </div>
     </div>  --> 

      <div class="row text-center"><!-- pretraga -->
        <div class="col-sm-7 offset-sm-2 justify-content-sm-center text-center" > <!-- polje za pretragu -->
          <form>
            <select class="form-control form-control-lg custom-select" multiple style="width: 100%" placeholder="U kući imam..." aria-label="Search for..." >
        
              <?php                    
                // Izlistavanje sastojaka - za unos u pretragu
                foreach ($viewmodel as $item) {
                    echo '<option value="' . $item['ingredient_id'] . '">' .
                    $item['ingredient_name'] . '</option>';
                } 
                ?>
            </select> 
          </form>
  
          <small class="white text-shadow">Unesite prva dva slova namirnice, a zatim je izaberite iz padajućeg menija.</small><br><br>
        </div><!--kraj polje za pretragu -->

        <div class="col-sm-1 justify-content-sm-center text-center" ><!--dugme za dodatne opcije -->
             <a class="btn btn-success mx-auto" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Dodatne opcije</a>
        </div><!-- kraj dugme -->
        <br><br><br>
    </div><!-- kraj pretraga -->
</div><!-- kraj cover slika i glavna pretraga -->

<!-- Main -->
<div class="container-fluid main">

      <!-- Dodatne opcije koje se otvaraju na dugme -->
      <div class="collapse" id="collapseExample"> 
          <div class="card card-body ">
            <div class="row">
            <div class="col-3">
             <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="4">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Slana jela</span>
              </label><br>
               <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="3">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Slatka jela</span>
              </label><br>
               <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="2">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Ljuta jela</span>
              </label><br>
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="15">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Vegetarijansko</span>
              </label>              
            </div>
            <div class="col-3">
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="1">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">U samo jednoj šerpi</span>
              </label><br>
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="17">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Do 15 minuta</span>
              </label><br>
               <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input"  value ="18">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Do 30 minuta</span>
              </label><br>
               <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="19">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Do 60 minuta</span>
              </label>
            </div>
             <div class="col-3">
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="8">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Za bebe</span>
              </label><br>
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="5">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Zimnica</span>
              </label><br>
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="21">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Bez alkohola</span>
              </label><br>
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input"  value ="9">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Sadrži alkohol</span>
              </label>               
            </div>
            <div class="col-3">
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="20">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Posno</span>
              </label><br>
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" value ="7">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Za poneti</span>
              </label><br>
               <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input"  value ="6">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Smooćkaj, i kreni</span>
              </label><br>
               <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input"  value ="12">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">Pržena jela</span>
              </label>
            </div>
            </div>
          </div>
        </div> <!--kraj dodatne opcije div-a -->

     <!-- Prikaz rezultata Ajax pretrage ako ih ima-->
     <div id="result" class='row'>

     </div> <!-- Kraj prikaza rezultata pretrage -->

     <!-- Prikaz 6 najnovijih recepata -->
     <div class='row no-gutters'>
     <div class="col-xl-5"> <hr> </div> <div class="col-xl-2 text-center section-title"> Najnoviji recepti </div>  <div class="col-xl-5"> <hr> </div>
      <br> <br> <br> 
       <?php
        
        $queryInstance->query("SELECT recipe_id,recipe_title,prep_time,recipe_photos,dirty_dishes FROM recipes WHERE (status = 1)  ORDER BY posting_time DESC LIMIT 6");
        $recepiesNewest = $queryInstance->resultSet();
        $mouseover = '"#28a745"';
        $mouseout = '"#212121"';

        foreach ($recepiesNewest as $item) {               
          $id= mb_strtolower($item['recipe_id']." ".$item['recipe_title'], 'UTF-8');
          $id = str_replace(" ", "-", $id);
          $id = $queryInstance->convertExtendedToNormal($id);
          echo "<div class='col-sm-12 col-xl-4 text-center'>";
          echo "<div class='row'>";
          echo "<div class='col-sm-12 col-xl-12 text-center'>";
          echo "<p>";
          echo "<a href='recipe/$id' class='recipelist' style='color: #212121 !important;' onMouseOver=this.style.color=$mouseover onMouseOut=this.style.color=$mouseout>" . $item['recipe_title'] . " </a>";
          echo "</p>";
          echo "</div>";
          echo "<div class='col-sm-12 col-xl-12'>";
          $img = explode( "," , $item['recipe_photos']);
          echo "<a href='recipe/$id' class='recipelist' style='color: #212121 !important;' onMouseOver=this.style.color=$mouseover onMouseOut=this.style.color=$mouseout><img class='d-block w-100' src='".ROOT_URL."assets/images/".$img[0]."' alt='".$item['recipe_title']."' > </a>";           
          echo "</div>";
          echo "<div class='col-sm-12 col-xl-12 result-img'>";
          echo "<div class='float-left '><img src='".ROOT_URL."/assets/images/5-star-rating.png' alt='stars' >";
          echo "</div></div>";
          echo "<div class='col-sm-12 col-xl-12 result-img'>";
          echo "<div class='float-left '><img src='".ROOT_URL."/assets/images/sat.png' alt='sat' class='small-img '>&nbsp;&nbsp;".$item['prep_time']."&nbsp;min";
          echo "</div></div>";
          echo "<div class='col-sm-12 col-xl-12 result-img'>";
          echo "<div class='float-left '><img src='".ROOT_URL."/assets/images/posuda.png' alt='sat' class='small-img '>&nbsp;&nbsp;".$item['dirty_dishes']."&nbsp;posuda";
          echo "</div></div>";
          echo "</div>";
          echo "</div>";
          
                }
       ?>
          <br> <br> <br> <br> 
     </div><!-- Kraj prikaz 6 najnovijih recepata -->

      <!-- Prikaz 6 najpopularnijih recepata -->
     <div class='row no-gutters'>
     <div class="col-xl-5"> <hr class="center-hr"> </div> <div class="col-xl-2 text-center section-title"> Najpopularniji recepti </div>  <div class="col-xl-5"> <hr class="center-hr"> </div>
      <br> <br> <br> <br> 
       <?php
        
        $queryInstance->query("SELECT recipe_id FROM ratings WHERE (status = 1)  ORDER BY rating_name DESC LIMIT 6");
        $categoriesTop = $queryInstance->resultSet();
        
        $mouseover = '"#28a745"';
        $mouseout = '"#212121"';
        

        foreach ($categoriesTop as $item) { 
          $query = "recipe_id=".$item['recipe_id'];
          $queryInstance->query("SELECT recipe_id,recipe_title,prep_time,recipe_photos,dirty_dishes FROM recipes WHERE (status = 1) AND ($query)");   
          $singleRecipe = $queryInstance->single();         
          $id= mb_strtolower($singleRecipe['recipe_id']." ".$singleRecipe['recipe_title'], 'UTF-8');
          $id = str_replace(" ", "-", $id);
          $id = $queryInstance->convertExtendedToNormal($id);

          echo "<div class='col-sm-12 col-xl-4 text-center'>";
          echo "<div class='row'>";
          echo "<div class='col-sm-12 col-xl-12 text-center'>";
          echo "<p>";
          echo "<a href='recipe/$id' class='recipelist' style='color: #212121 !important;' onMouseOver=this.style.color=$mouseover onMouseOut=this.style.color=$mouseout>" . $singleRecipe['recipe_title'] . " </a>";
          echo "</p>";
          echo "</div>";
          echo "<div class='col-sm-12 col-xl-12'>";
          $img = explode( "," , $singleRecipe['recipe_photos']);
          echo "<a href='recipe/$id' class='recipelist' style='color: #212121 !important;' onMouseOver=this.style.color=$mouseover onMouseOut=this.style.color=$mouseout><img class='d-block w-100' src='".ROOT_URL."assets/images/".$img[0]."' alt='".$singleRecipe['recipe_title']."' > </a>";           
          echo "</div>";
          echo "<div class='col-sm-12 col-xl-12 result-img'>";
          echo "<div class='float-left '><img src='".ROOT_URL."/assets/images/5-star-rating.png' alt='stars' >";
          echo "</div></div>";
          echo "<div class='col-sm-12 col-xl-12 result-img'>";
          echo "<div class='float-left '><img src='".ROOT_URL."/assets/images/sat.png' alt='sat' class='small-img '>&nbsp;&nbsp;".$singleRecipe['prep_time']."&nbsp;min";
          echo "</div></div>";
          echo "<div class='col-sm-12 col-xl-12 result-img'>";
          echo "<div class='float-left '><img src='".ROOT_URL."/assets/images/posuda.png' alt='sat' class='small-img '>&nbsp;&nbsp;".$singleRecipe['dirty_dishes']."&nbsp;posuda";
          echo "</div></div>";
          echo "</div>";
          echo "</div>";
                }
       ?>
          <br> <br> <br> <br> 
     </div><!-- Kraj prikaz 6 najpopularnijih recepata -->




</div><!-- kraj main -->

<!-- KRAJ STRANE -->


<!-- jQuery for search field -->

<script type="text/javascript">

  var select_val;  
  var checkbox;
  var pagination;

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
  // on_select prikupljanje podataka iz formi
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
    return ajax_call(select_val, checkbox, pagination =1);
 }
});
  
   //on_unselect prikupljanje podataka iz formi
$("select").on("select2:unselect", function (evt) {
    select_val = $(evt.currentTarget).val();
    checkbox =[];
    $(".custom-control-input:checked").each(function(){    
               checkbox.push($(this).val());
          });

 if(select_val ==null && checkbox ==null || select_val =="" && checkbox =="" || select_val ==null && checkbox =="" || select_val =="" && checkbox ==null){
      $("div#result").text("");
  } else {
       
       return ajax_call(select_val, checkbox, pagination =1); 
  }
});
  // funkcija koja prikuplja podatke kad se klikne na checkbox u dodatnim opcijama
$(".custom-control-input").click(function(){
      checkbox =[];
     $(".custom-control-input:checked").each(function(){
                checkbox.push($(this).val());
            });
      select_val = $("select").val();

  if(select_val ==null && checkbox ==null || select_val =="" && checkbox =="" || select_val ==null && checkbox =="" || select_val =="" && checkbox ==null){

      $("div#result").text("");
  } else {        
          
          return ajax_call(select_val, checkbox,pagination =1);        
      }     
    });

//  slanje ID-a strane na koju je korisnik kliknuo
$("div#result").on("click","a.page-link", function(event){
  
  pagination = event.target.id;
  
  if (pagination == 'point' || pagination == 'pointa' ){}
   else{
     checkbox =[];
     $(".custom-control-input:checked").each(function(){
                checkbox.push($(this).val());
            });
      select_val = $("select").val();
    
      return ajax_call(select_val, checkbox, pagination); 
 }

});


//ajax funkcija
 function ajax_call() {             
    $.post("assets/ajax.php", {data: select_val , cat: checkbox, page: pagination}, function(result){
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
       if(select_val ==null && checkbox ==null || select_val =="" && checkbox =="" || select_val ==null && checkbox =="" || select_val =="" && checkbox ==null){
            $("div#result").text("");
       } else {  
            return ajax_call(select_val, checkbox);        
      }     
});


</script>









