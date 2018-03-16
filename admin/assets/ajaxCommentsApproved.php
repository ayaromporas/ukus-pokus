<?php
/* javlja se na search stranici, radi naprednu pretragu */

include ('../config.php');
include ('../classes/Database.php');
include ('../classes/Model.php');

$database = new Database();
$errors = array();  //napisati kod koji obavestava korisnika da je neka greska na serveru

$pages = $_POST['onPageComm'];

if(isset($_POST['onPage']) && $_POST['onPage']!==null && $_POST['onPage']!=="" ){
$page = $_POST['onPage'];
} else {
  $page=1;
}

if(isset($_POST['approvedChoice']) && $_POST['approvedChoice']!==null && $_POST['approvedChoice']!=="" ){

  $choice = $_POST['approvedChoice'];
	$recipeId = $_POST['recId'];

	$database->query('UPDATE comments SET status = :status WHERE comment_id= :id');
		$database->bind(':status', $choice);
		$database->bind(':id', $recipeId);
		$database->execute();

		$database->query('SELECT comments.comment_id, comments.comment_name, comments.comment_email, comments.comment_text, comments.comment_time, comments.status, recipes.recipe_id, recipes.recipe_permalink, recipes.recipe_title FROM comments INNER JOIN recipes ON comments.recipe_id = recipes.recipe_id WHERE comments.status=1 ORDER BY comments.comment_time ASC');

	 $comments = $database->resultSet();
   $numberComments = count($comments);

	 ?>

	 <div  class="cards-grid" data-columns>
	 <?php

   $x = ($page-1) * $pages;
   $y = $x + $pages;

   while ($x < $y){
   if (!($x > ($numberComments-1))) {
   $comment = $comments[$x];
   $commentId = $comment['comment_id'];
   $commentName = $comment['comment_name'];
   $commentEmail = $comment['comment_email'];
   $recipeTitle = $comment['recipe_title'];
   $recipeId = $comment['recipe_id'];
   $recipePermalink = $comment['recipe_permalink'];
   $commentText = $comment['comment_text'];
   $commentTime = date_create($comment['comment_time']);
   $commentTime = date_format($commentTime, "d.m.Y g:i a");

   ?>
     <div class="card-grid-col">
       <article class="card-typical">
         <div class="card-typical-section">
           <div class="user-card-row">
             <div class="tbl-row">
               <div class="tbl-cell tbl-cell-photo">
                 <img src="<?php echo ROOT_URL; ?>assets/img/avatar-2-48.png" alt="">
               </div>
               <div class="tbl-cell">
                 <p class="user-card-row-name"><a><?php echo $commentName; ?></a></p>
                 <p class="color-blue-grey-lighter"><?php echo $commentTime; ?></p>
               </div>
               <div class="tbl-cell tbl-cell-photo">
               </div>
               <div class="tbl-cell tbl-cell-photo">
   							<a onclick="aproveComment(<?php echo $commentId ?>,0)" title='Zabrani'>
   								<i class="fas fa-times-circle red fa-3x"></i>
   							</a>
   						</div>
             </div>
           </div>
         </div>
         <div class="card-typical-section card-typical-content">

           <header class="title"><a href="<?php echo HOME.'/recipe/'.$recipeId.'/'.$recipePermalink ?>"><span class="label label-pill"><?php echo $recipeId; ?></span>&nbsp;&nbsp;<?php echo $recipeTitle; ?></a></header>
           <p class="wrap"><?php echo $commentText; ?></p>
         </div>
         <div class="card-typical-section">
           <div class="card-typical-linked"><?php echo $commentEmail; ?></div>

         </div>
       </article><!--.card-typical-->
     </div><!--.card-grid-col-->


   <?php
   } $x++;
   }
   ?> <!-- Kraj ispisa pronadjenih recepata petljom -->
   </div><!--.card-grid-->


   <?php
   $countCommentsArray = array('count' => $numberComments);
   $fp = fopen('results.json', 'w');
   fwrite($fp, json_encode($countCommentsArray, JSON_PRETTY_PRINT));   //here it will print the array pretty
   fclose($fp);

  } else {

 $database->query('SELECT comments.comment_id, comments.comment_name, comments.comment_email, comments.comment_text, comments.comment_time, comments.status, recipes.recipe_id, recipes.recipe_title, recipes.recipe_permalink FROM comments INNER JOIN recipes ON comments.recipe_id = recipes.recipe_id  WHERE comments.status=1 ORDER BY comments.comment_time ASC');

$comments = $database->resultSet();
$numberComments = count($comments);

?>

<div  class="cards-grid" data-columns>
<?php

$x = ($page-1) * $pages;
$y = $x + $pages;

while ($x < $y){
if (!($x > ($numberComments-1))) {
$comment = $comments[$x];
$commentId = $comment['comment_id'];
$commentName = $comment['comment_name'];
$commentEmail = $comment['comment_email'];
$recipeTitle = $comment['recipe_title'];
$recipeId = $comment['recipe_id'];
$recipePermalink = $comment['recipe_permalink'];
$commentText = $comment['comment_text'];
$commentTime = date_create($comment['comment_time']);
$commentTime = date_format($commentTime, "d.m.Y g:i a");

?>
  <div class="card-grid-col">
    <article class="card-typical">
      <div class="card-typical-section">
        <div class="user-card-row">
          <div class="tbl-row">
            <div class="tbl-cell tbl-cell-photo">
              <img src="<?php echo ROOT_URL; ?>assets/img/avatar-2-48.png" alt="">
            </div>
            <div class="tbl-cell">
              <p class="user-card-row-name"><a><?php echo $commentName; ?></a></p>
              <p class="color-blue-grey-lighter"><?php echo $commentTime; ?></p>
            </div>
            <div class="tbl-cell tbl-cell-photo">
            </div>
            <div class="tbl-cell tbl-cell-photo">
							<a onclick="aproveComment(<?php echo $commentId ?>,0)" title='Zabrani'>
								<i class="fas fa-times-circle red fa-3x"></i>
							</a>
						</div>
          </div>
        </div>
      </div>
      <div class="card-typical-section card-typical-content">

        <header class="title"><a href="<?php echo HOME.'/recipe/'.$recipeId.'/'.$recipePermalink ?>"><span class="label label-pill"><?php echo $recipeId; ?></span>&nbsp;&nbsp;<?php echo $recipeTitle; ?></a></header>
        <p class="wrap"><?php echo $commentText; ?></p>
      </div>
      <div class="card-typical-section">
        <div class="card-typical-linked"><?php echo $commentEmail; ?></div>

      </div>
    </article><!--.card-typical-->
  </div><!--.card-grid-col-->


<?php
} $x++;
}
?> <!-- Kraj ispisa pronadjenih recepata petljom -->
</div><!--.card-grid-->


<?php
$countCommentsArray = array('count' => $numberComments);
$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($countCommentsArray, JSON_PRETTY_PRINT));   //here it will print the array pretty
fclose($fp);

}
?>


<div class="clear"></div>
<!-- paginacija -->
<div class="col-xs-12 text-center">
<section id="paginationHome">
<br>
<nav aria-label="pagination">
<ul class="pagination justify-content-center pointerClass">

<?php if ($numberComments > 0){  //iscrtavanje paginacije

 $i = ($numberComments/$pages);
 $i = ceil($i);


 if ($i == 1) {
   echo '<li class="page-item active"><span class="page-link" >'.$i.'</span></li>';

 }elseif (($i > 1) && ($i < 8)) {
   for ($e = 1; $e < ($i+1); $e++) {
     if ($e == $page) {
       echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
     }else{
       echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
            }
   }

 }elseif ($i >= 8) {
   if ($page >= 5){
     if ($page > ($i-4)) {
       echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
       echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
       for ($e = ($i-4); $e < ($i+1); $e++) {
         if ($e == $page) {
         echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
         }else{
         echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
         }
       }

     }else{
       echo '<li class="page-item"><span id=" ' . "1". ' " class="page-link" onclick="pagination('. "1" .')">1</span></li>';
       echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';

       for ($e = $page-2; $e < ($page+3); $e++) {
         if ($e == $page) {
         echo '<li class="page-item active"><span class="page-link" >'.$e.'</span></li>';
         }else{
         echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
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
         echo '<li class="page-item"><span id=" ' . $e. ' " class="page-link" onclick="pagination('. $e .')">'.$e.'</span></li>';
       }
     }
     echo '<li class="page-item"><span class="page-link" >'."...".'</span></li>';
     echo '<li class="page-item"><span id=" ' . $i. ' " class="page-link" onclick="pagination('. $i .')">'.$i.'</span></li>';
   }
 }
?>

    </ul>
</nav>
</section>

<?php } ?>
</div>

<script src="<?php echo ROOT_URL; ?>assets/js/lib/salvattore/salvattore.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT_URL; ?>assets/js/lib/match-height/jquery.matchHeight.min.js"></script>
<script>
	$(function() {
		$('.card-user').matchHeight();
	});
</script>
