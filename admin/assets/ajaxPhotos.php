<?php
/* javlja se na units/index stranici */
include ('../config.php');
include ('../classes/Database.php');

$database = new Database();

$errors = array();

$page = 1;
$number = 12;
$keyword = "%%";



if(isset($_POST)){
	$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
}

if(isset($postArray['page']) ){
	$page = $postArray['page'];
	// echo "Promenljiva page: ";
	// var_dump($page);
}

if(isset($postArray['number']) ){
	$number = $postArray['number'];
	// echo "Promenljiva number: ";
	// var_dump($number);
}

if(isset($postArray['keyword']) ){
	$keyword = $postArray['keyword'];
	$keyword = "%". $keyword . "%";
	// echo "Promenljiva keyword: ";
	// var_dump($keyword);
}

//upit u bazu
$database->query("SELECT photo_id, photo_title, photo_alt, photo_link ,status, recipe_id FROM photos WHERE photo_title LIKE '{$keyword}' ORDER BY photo_id");
$photos = $database->resultSet();
$numberResults = count($photos);

//definisanje limita i paginacije
$limit = $number; // broj komada po strani

//echo $numberResults;

if($numberResults == 0){
	echo '<div class="alert alert-warning alert-dismissible fade show keywords-warning mx-auto mt-3" role="alert">Nema takve slike u bazi.</div>';
	return;
}else{

?>
<script src="<?php echo ROOT_URL; ?>assets/js/lib/salvattore/salvattore.min.js"></script>
  <script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/lib/match-height/jquery.matchHeight.min.js"></script>
  <script>
    $(function() {
      $('.card-user').matchHeight();
    });
  </script>

<div  class="cards-grid" data-columns="4">
	


<?php

	// Ispis pronadjenih jedinica mere petljom
             $x = ($page-1) * $limit;
             $y = $x + $limit;

             for ($i=$x; $i < $y; $i++){

                	 if (!($x > ($numberResults-1))) {

                	 	$id = $photos[$x]['photo_id'];
                	 	$name = $photos[$x]['photo_title'];
                	 	$alt = $photos[$x]['photo_alt'];
                	 	$link = $photos[$x]['photo_link'];
                	 	$statusw = $photos[$x]['status'];
                	 	$recId = $photos[$x]['recipe_id'];

                	 	if($statusw == 1){
				$status = "aktivno";
				$color = "label label-success";
			}elseif ($statusw == 0) {
				$status = "obrisano";
				$color = "label label-danger";
			}

			// stampanje liste
?>

<div class="card-grid-col">
	<article class="card-typical">
		<div class="card-typical-section">
			<div class="user-card-row images-view">

				<div class="tbl-row">
					<div class="tbl-cell tbl-cell-photo">
						<span class="label label-pill"><?php echo $id; ?></span>
					</div>

					<div class="tbl-cell">
						<p class="color-blue-grey-lighter"><a href="<?php echo HOME; ?>assets/img/<?php echo $link; ?>"  target="blank"><?php echo HOME; ?>assets/img/<?php echo $link; ?></a></p>
					</div>
					<div class="tbl-cell p-3">
						<a href="<?php echo ROOT_URL; ?>images/edit/<?php echo $id; ?>">
							<i class="font-icon fas fa-edit grey-icon fa-lg"></i>
						</a>
					</div>
					<div class="tbl-cell p-1">
						<a href="<?php echo ROOT_URL; ?>images/delete/<?php echo $id; ?>">
							<i class="font-icon fas fa-trash grey-icon fa-lg"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="card-typical-section card-typical-content pb-0 mb-0">
			<header class="title"><a href="#"><?php echo $name; ?></a></header><br>
			<div class="photo">
				<img src="<?php echo HOME; ?>/assets/img/<?php echo $link; ?>" alt="<?php echo $alt; ?>">
			</div>
			
		</div>
		<div class="card-typical-section">
			<a href="#" class="card-typical-likes">
				<span class="<?php echo $color; ?> btn-sm"><?php echo $status; ?></span>
			</a>
		</div>
	</article><!--.card-typical-->
</div><!--.card-grid-col-->


<?php
		} // kraj if - ako je x < rezultata
		$x++;
	} // kraj for

?>
</div>

<div class="clear"></div>

<?php
$countImagesArray = array('count' => $numberResults);
$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($countImagesArray, JSON_PRETTY_PRINT));   //here it will print the array pretty
fclose($fp);

} // kraj else glavni - ako ima rezultata

?>

<section id="paginationImages" class="text-center">
	<br>
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center">

	<?php

/*-------------------------------------------------------iscrtavanje paginacije -----------------------------------*/
	 if ($numberResults > 0){  //iscrtavanje paginacije

		$i = ($numberResults/$limit);
		$i = ceil($i);

		if ($i == 1) {				/* prvi slucaj */
			echo '<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';

		}elseif (($i > 1) && ($i < 8)) {
			for ($e = 1; $e < ($i+1); $e++) {
				if ($e == $page) {
					echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
				}else{
					echo '<li class="page-item"><span id="' . $e. '" class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
				       }
			}

		}elseif ($i >= 8) {			/*drugi slucaj  */
			if ($page >= 5){
				if ($page > ($i-4)) {
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
					for ($e = ($i-4); $e < ($i+1); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id="' . $e. '" class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
						}
					}

				}else{
					echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';

					for ($e = $page-2; $e < ($page+3); $e++) {
						if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
						}else{
						echo '<li class="page-item"><span id="' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
						}
					}

					echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
					echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
				}

			}elseif ($page < 5) {
				for ($e = 1; $e < 6; $e++) {
					if ($e == $page) {
						echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
					}else{
						echo '<li class="page-item"><span id="' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
					}
				}
				echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
				echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
			}
		} /* treci slucaj */
	?>
       </ul>
   </nav>
</section>
<?php
	}
