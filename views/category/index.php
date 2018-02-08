<?php
if(($_GET['id']) == NULL){
  header('Location: ' . ROOT_URL); //preusmeravanje na pocetnu ako nema trazenog recepta
}
$catId = $_GET['id'];

$cat = $viewmodel; //naziv kategorije

?>
<div class="main">
    <div class="container bestRecipes">
          <br>
	<div class="row">
	
		<div class="col-12 text-center">
			<br><h2>Recepti koji pripadaju kategoriji   <span class='green'><?php  echo $cat['cat_name'];  ?></span> </h2><br><br><br>
		</div>	
	</div>

	<!-- ispis liste recepata -->
	
        <div id="result">
			</div>

</div>


 

</div> <!-- end container fluid -->

<script type="text/javascript">
var catId;
var page;
$(document).ready(function(){
    catId = <?php echo json_encode($catId); ?>;	 
    return ajax_call(catId,page);            
});

function pagination(page){
      page = parseInt(page) ;
      return ajax_call(catId, page); 
 }

//ajax funkcija
  function ajax_call(catId, page) {             
    $.post("../../assets/ajax3.php", {cat: catId, page: page}, function(result){
            $("div#result").html(result);
            
    });
}

</script>

