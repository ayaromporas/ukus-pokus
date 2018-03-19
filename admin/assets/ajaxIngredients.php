<?php
/* javlja se na units/index stranici */
include ('../config.php');
include ('../classes/Database.php');
$database = new Database();
$errors = array();
$page = 1;
$number = 10;
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
$database->query("SELECT * FROM ingredients WHERE ingredient_name LIKE '{$keyword}' ORDER BY ingredient_id");
$ingredients = $database->resultSet();
$numberResults = count($ingredients);
//definisanje limita i paginacije
$limit = $number; // broj komada po strani
//echo $numberResults;
if($numberResults == 0){
  echo '<div class="alert alert-warning alert-dismissible fade show keywords-warning mx-auto mt-3" role="alert">Nema takve jedinice mere u bazi.</div>';
  return;
}else{
?>

<table id="ingredientslist" class="table">
  <thead>
  <tr>
    <th class="text-center">Id</th>
    <th class="text-center">Naziv</th>
    <th class="text-center">Status</th>
    <th class="text-center">Izmeni</th>
    <th class="text-center">Obriši</th>
  </tr>
  </thead>
  <tbody>

<?php
  // Ispis pronadjenih jedinica mere petljom
             $x = ($page-1) * $limit;
             $y = $x + $limit;
             while ($x < $y){
                   if (!($x > ($numberResults-1))) {
                    $id = $ingredients[$x]['ingredient_id'];
                    $name = $ingredients[$x]['ingredient_name'];
                    $statusw = $ingredients[$x]['status'];
                    if($statusw == 1){
        $status = "aktivno";
        $color = "btn-success";
      }elseif ($statusw == 0) {
        $status = "obrisano";
        $color = "btn-danger";
      }
      // stampanje liste
?>
<tr>
  <td class="text-center"><span class="label label-pill"><?php echo $id; ?></span></td>
  <td class="text-center"><?php echo $name; ?></td>
  <td class="text-center"><button type="button" class="btn btn-rounded <?php echo $color; ?> btn-sm"><?php echo $status; ?></button></td>
  <td class="text-center table-icon-cell"><a href="<?php echo ROOT_URL; ?>ingredients/edit/<?php echo $id; ?>"><i class="font-icon fas fa-edit"></i></a></td>
  <td class="text-center table-icon-cell"><a href="<?php echo ROOT_URL; ?>ingredients/delete/<?php echo $id; ?>"><i class="font-icon fas fa-trash"></i></a></td>

</tr>

<?php
    } // kraj if - ako je x < rezultata
    $x++;
  } // kraj while
?>

  </tbody>
</table>

<?php
$countIngredientsArray = array('count' => $numberResults);
$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($countIngredientsArray, JSON_PRETTY_PRINT));   //here it will print the array pretty
fclose($fp);
} // kraj else glavni - ako ima rezultata
?>

<section id="paginationUnits" class="text-center">
  <br>
  <nav aria-label="pagination">
          <ul class="pagination justify-content-center">

  <?php
/*-------------------------------------------------------iscrtavanje paginacije -----------------------------------*/
   if ($numberResults > 0){  //iscrtavanje paginacije
    $i = ($numberResults/$limit);
    $i = ceil($i);
    if ($i == 1) {        /* prvi slucaj */
      echo '<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';
    }elseif (($i > 1) && ($i < 8)) {
      for ($e = 1; $e < ($i+1); $e++) {
        if ($e == $page) {
          echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
        }else{
          echo '<li class="page-item"><span id="' . $e. '" class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
               }
      }
    }elseif ($i >= 8) {     /*drugi slucaj  */
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