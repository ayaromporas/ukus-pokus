

<div>

<br><br>
<?php foreach ($viewmodel as $item) : ?>

	<div class="well">
		<h3><?php echo $item['title']; ?></h3>
		<small><?php echo $item['posting_time']; ?></small>

		<hr>
		<p>Vreme pripreme: <?php echo $item['prep_time']; ?> min </p>
		<p><?php echo $item['dirty_dishes']; ?> </p>

		<br>
		<a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Pročitaj ceo recept</a>
	</div>

<?php endforeach; ?>

</div>


