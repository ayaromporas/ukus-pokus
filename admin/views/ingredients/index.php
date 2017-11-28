
<table class="table">
  <thead>
    <tr>
	  <th scope="col">#</th>
      <th scope="col">Naziv</th>
      <th scope="col">id</th>
      <th scope="col">#</th>
    </tr>
  </thead>
	
	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<tr>
		  <td></td>
		  <td><input type="text" name="ingredient_name" class="form-control" /></td>
		  <td></td>
		  <td><input class="btn btn-primary" name="submit" type="submit" value="Add" /></td>
		</tr>
	</form>

<?php $i = 1; foreach($viewmodel as $item) : ?>
	  <tbody>
    <tr>
      <td><?php echo $i; $i++ ?></td>
      <td><?php echo $item['ingredient_name']; ?></td>
      <td><?php echo $item['status']; ?></td>
      <td>
		<?php
		$id = $item['ingredient_id']; 
		if($item['status'] == 0){	
			echo '<button type="button" onclick="activate('."'ingredients','ingredient_id',".$id.')" class="btn btn-success">Activate</button></td>';
		}else{
			echo "<button type='button' onclick='del(".'"ingredients","ingredient_id",'.$id.")' class='btn btn-danger btn-sm'>Delete</button></td>";
		}?>
    </tr>

<?php endforeach; ?>


  </tbody>
</table>

<script>
	function del(table,row,value){
		var xhr = new XMLHttpRequest();
		xhr.open("get", "delete.php?table="+table+"&row="+row+"&value="+value, false);
		xhr.send();
		var odgovor = xhr.responseText;
		if(odgovor!==""){
			alert(odgovor);
		}
	}
	
	function activate(table,row,value){

		var xhr = new XMLHttpRequest();
		xhr.open("get", "activate.php?table="+table+"&row="+row+"&value="+value, false);
		xhr.send();
		var odgovor = xhr.responseText;
		if(odgovor!==""){
			alert(odgovor);
		}
	}
</script>

