
<!-- script za Ajax select2-->
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
<!-- end script za Ajax select2-->

<!-- POCETAK STRANE -->
<div class="container-fluid main">

	  <div class="row"><!-- Row za naslov -->
	    <div class="col-12 text-center brown">
	      <br>
	      <h2>Napredna pretraga</h2><br><br>
	     </div>
	  </div><!-- End row naslov-->
  
<form method="post"> <!-- Forma za pretragu po namirnicama - select polje --> 
<div class="row text-center"><!-- Row select polja za pretragu po namirnicama -->
          <div class="col-7 offset-2 "  >

          
            <select class="form-control form-control-lg custom-select" multiple style="width: 100%" placeholder="U kući imam..." aria-label="Pretraga..." name="pretraga" id='mySelect2'>

             <?php
               // Izlistavanje sastojaka - za unos u pretragu
               foreach ($viewmodel as $item) {
                  echo '<option value="' . $item['ingredient_id'] . '">' .
                  $item['ingredient_name'] . '</option>';
                } 
             ?>

              </select> 
        
     </div><!-- kraj reda za select polje -->
     <div class="col-2"><!-- Dugme za reset -->
          <a id="reset" class="btn btn-success" data-toggle="button" aria-pressed="false">Resetuj sve filtere</a>
     </div><!-- kraj dugme za reset -->
</div>

   <div class="row">
   	<div class="col-7 offset-2 text-center">
   		<small>Unesite prva dva slova namirnice, a zatim je izaberite iz padajućeg menija.</small>
   	</div>
   </div><br><br>
    
   <!-- Div napredne pretrage -->
      <div class="row">
    	<div class="col-12">
    	<div class="card card-body ">
    		<br>
    		<p><strong>Pretraga po kategorijama</strong></p>
    		<div class="row">    			
    			<div class="col-3 justify-content-left">

    			<?php
    			$n = count($catsAll);

    			foreach ($catsAll as $kat) {
    				$catId = $kat['cat_id'];
	    			$catName = $kat['cat_name'];

    				if(is_int($catId/5)){    					

	    				echo '<div class="check-rejting">';
	    				echo '<label class="custom-control custom-checkbox">';
	    				echo '<input type="checkbox" id="'.$catId .'" class="custom-control-input" value="'.$catId.'" name="kategorije">';
	    				echo '<span class="custom-control-indicator"></span>';
	    				echo '<span class="custom-control-description">'.$catName.'</span>';
	    				echo '</label></div></div>';	
	    				echo '<div class="col-3 justify-content-left">';    				

    				}else {
    					$catId = $kat['cat_id'];
	    				$catName = $kat['cat_name'];
	    				echo '<div class="check-rejting">';
	    				echo '<label class="custom-control custom-checkbox">';
	    				echo '<input type="checkbox" id="kat'.$catId .'" class="custom-control-input" value="'.$catId.'" name="kategorije">';
	    				echo '<span class="custom-control-indicator"></span>';
	    				echo '<span class="custom-control-description">'.$catName.'</span>';
	    				echo '</label></div>';

    				}
    				//echo $catId;
    			}
    			?>
    			
    			</div>
    		</div>
    		<br>
    		<hr>
    		<br>
    		<p><strong>Pretraga po rejtingu</strong></p>
    		<div class="d-flex justify-content-left">
    			<div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="5stars" class="custom-control-input" value="5" name="rejting">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 5 zvezdica</span>
			</label>
    			</div>

    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="4stars" class="custom-control-input" value="4" name="rejting">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 4 zvezdice</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="3stars" class="custom-control-input" value="3" name="rejting">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 3 zvezdice</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="2stars" class="custom-control-input" value="2" name="rejting">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 2 zvezdice</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="1stars" class="custom-control-input" value="1" name="rejting">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 1 zvezdica</span>
			</label>
    			</div>
    
    		</div>
    		<br>
    		<hr>
    		<br>

    		<p><strong>Pretraga po dužini pripreme</strong></p>
    		<div class="d-flex justify-content-left">

    			<div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="15min" class="custom-control-input" value="15" name="vreme" >
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> manje od 15 min</span>
			</label>
    			</div>

    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="15-30" class="custom-control-input" value="30" name="vreme">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 15 - 30 min</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="30-45" class="custom-control-input" value="45" name="vreme">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 30 - 45 min</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="45-60" class="custom-control-input" value="60" name="vreme">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 45 - 60 min</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="60-120" class="custom-control-input" value="120" name="vreme">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 60 - 120 min</span>
			</label>
    			</div>

    		</div>
    		<br>
    		<hr>
    		<br>

    		<p><strong>Pretraga po broju isprljanih posuda</strong></p>
    		<div class="d-flex justify-content-left">

    			<div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="1posuda" class="custom-control-input" value="1" name="posude">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> samo 1 posuda</span>
			</label>
    			</div>

    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="2posude" class="custom-control-input" value="2" name="posude">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 2 posude</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="3posude" class="custom-control-input" value="3" name="posude">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 3 posude</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="4posude" class="custom-control-input" value="4" name="posude">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 4 posude</span>
			</label>
    			</div>
    			
    			 <div class="check-rejting">
    			<label class="custom-control custom-checkbox">
			  <input type="checkbox" id="5posuda" class="custom-control-input" value="5" name="posude">
			  <span class="custom-control-indicator"></span>
			  <span class="custom-control-description"> 5 i više posuda</span>
			</label>
    			</div>
    		</div>
    		<br>
   	  </div>
     </div> 
  </div><!-- Kraj diva za naprednu pretragu -->
</form>

     <!-- Prikaz rezultata Ajax pretrage ako ih ima-->
     <div id="result">
     </div> <!-- Kraj prikaza rezultata pretrage -->

      
</div><!-- kraj main -->

<!-- KRAJ STRANE -->

<!-- jQuery for search field -->
<script type="text/javascript">

//zadrzavanje vrednosti nakon dugmeta Back
$(document).ready(function(){  

    //skupljanje vrednosti iz selecta
    select_val = $("select").val();
    if(select_val ==null || select_val ==""){  
            select_val = [];         
           console.log(select_val);
    }

    //skupljanje vrednosti iz posude    
      $("input[name='posude']:checked").each(function(){
        posude =[];
                posude.push($(this).val());
      });

      //skupljanje vrednosti iz vreme       
      $("input[name='vreme']:checked").each(function(){
        vreme =[];
                vreme.push($(this).val());
      });

      //skupljanje vrednsoti iz kategorije      
      $("input[name='kategorije']:checked").each(function(){
        kategorije =[];
                kategorije.push($(this).val());
      });

      //skupljanje vrednosti iz rejtinga      
      $("input[name='rejting']:checked").each(function(){
        rejting =[];
                rejting.push($(this).val());
      });
      console.log(select_val,posude,vreme,kategorije, rejting);
       return ajax_call(select_val, posude, vreme, kategorije, rejting); 

});


var select_val;  
var posude;
var kategorije;
var vreme;
var rejting;




$("select").select2({             
      minimumInputLength: 1,
      placeholder: 'Unesite namirnice koje želite da upotrebite...',
      language: {
            inputTooShort: function () {
                   return 'Krenite da kucate...';
            },
            noResults: function () {
                   return 'Nije pronađen nijedan rezultat';
            },
      }
});

// Slanje odabranih namirnica
$("select").on("select2:select", function (evt) {
       select_val = $(evt.currentTarget).val();  
       return ajax_call(select_val, posude, vreme, kategorije, rejting);       
});


// Ponistavanje odabranih namirnica
$("select").on("select2:unselect", function (evt) {
       select_val = $(evt.currentTarget).val();  

        if(select_val ==null || select_val ==""){
           select_val = [];
           console.log(select_val);
        }
          return ajax_call(select_val, posude, vreme, kategorije, rejting);
});

// Slanje izabranih dugmica za broj posuda
$("input[name='posude']").click(function(){
      posude =[];
      $("input[name='posude']:checked").each(function(){
                posude.push($(this).val());
      });
      console.log(posude);
       return ajax_call(select_val, posude, vreme, kategorije, rejting);            
});

// Slanje izabranih dugmica za vreme pripreme
$("input[name='vreme']").click(function(){
      vreme =[];
      $("input[name='vreme']:checked").each(function(){
                vreme.push($(this).val());
      });
      console.log(vreme);
       return ajax_call(select_val, posude, vreme, kategorije, rejting);           
});

// Slanje izabranih dugmica za kategorije
$("input[name='kategorije']").click(function(){
      kategorije =[];
      $("input[name='kategorije']:checked").each(function(){
                kategorije.push($(this).val());
      });
      console.log(kategorije);
       return ajax_call(select_val, posude, vreme, kategorije, rejting);            
});

// Slanje izabranih dugmica za rejting
$("input[name='rejting']").click(function(){
      rejting =[];
      $("input[name='rejting']:checked").each(function(){
                rejting.push($(this).val());
      });
      console.log(rejting);
       return ajax_call(select_val, posude, vreme, kategorije, rejting);            
});


//Poziv ajaxa
function ajax_call() {             
       $.post("assets/ajax2.php", {data: select_val, posude: posude, vreme: vreme, kategorije: kategorije, rejting: rejting}, function(result){
            $("div#result").html(result);
       });
}


// Dugme za reset
$('#reset').click(function() {
    location.reload();
});



</script>




