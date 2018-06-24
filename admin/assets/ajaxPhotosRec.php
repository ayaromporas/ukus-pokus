<?php
/* javlja se na insert recipe stranici, radi prikaz slika na pretragu, za unos u recept */

include ('../config.php');
include ('../classes/Database.php');

$database = new Database();

$errors = array();  //napisati kod koji obavestava korisnika da je neka greska na serveru

$limit = 6;
$page = 1;
$query = "";


if (isset($_POST['keyword']) && is_string($_POST['keyword']) ) {

	$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	$keyword = $postArray['keyword'];

	// echo "Ključne reči: ";
 //    	var_dump($keyword);
 //    	echo '<br>';

    	if ($keyword != "") {

    		if(strlen($keyword) > 4 ){
			$query .= " AND ";
			$query .= " (photo_title like '%" . $keyword . "%' ) ";

			//echo "SELECT photo_id, photo_title, photo_link  FROM photos WHERE (status=1) " . $query;

			$database->query("SELECT photo_id, photo_title, photo_link  FROM photos WHERE (status=1) " . $query);
			$photos = $database->resultSet();
			$numberPhotos = count($photos);

			if($numberPhotos == 0){
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">U galeriji nema slika sa tom ključnom reči u nazivu.</div>';

			}elseif ($numberPhotos > 0) {
				echo '<p class="text-center">U galeriji ima <strong>' . $numberPhotos . ' </strong>slika sa tom ključnom reči u nazivu</p>';
				echo "<div class='d-flex flex-wrap'>";


				foreach ($photos as $photo) {
					$photoId = $photo['photo_id'];
					$photoTitle = $photo['photo_title'];
					$photoLink = $photo['photo_link'];

					?>

					<div class="card col-sm-3 pt-1">
						<header>
							<label for="photo<?php echo $photoId; ?>" style="cursor:pointer;">
								<input type="checkbox" name="images[]" id="photo<?php echo $photoId; ?>" value="<?php echo $photoId; ?>" style="cursor:pointer;"> &nbsp; <span class="label label-pill"><?php echo $photoId; ?></span>  <?php echo $photoTitle; ?>
								<img src="<?php echo HOME; ?>assets/img/<?php echo $photoLink; ?>" class="imgrec my-2">
							</label>
						</header>



					</div>


					<?php
				}

				echo "</div>";

?>
				<!-- paginacija -->
			<!-- 	<nav aria-label="Page navigation example" class="text-center" id="recipeimginsert">
				  <ul class="pagination">

				    <li class="page-item"><a class="page-link" href="#">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">...</a></li>
				    <li class="page-item"><a class="page-link" href="#">12</a></li>
				    <li class="page-item active"><a class="page-link" href="#">13</a></li>
				    <li class="page-item"><a class="page-link" href="#">14</a></li>
				    <li class="page-item"><a class="page-link" href="#">...</a></li>
				    <li class="page-item"><a class="page-link" href="#">37</a></li>

				  </ul>
				</nav> -->

<?php



			}








?>














<?php
    		}else{
    			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Potrebno je uneti 5 i više slova</div>';
    		}


	}
}
