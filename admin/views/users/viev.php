
<table class="table">
  <thead>
    <tr>
	  <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Status</th>
      <th scope="col">#</th>
    </tr>
  </thead>


<?php $i = 1; foreach($viewmodel as $item) : ?>
	  <tbody>
    <tr>
      <td><?php echo $i; $i++ ?></td>
      <td><?php echo $item['user_name']; ?></td>
      <td><?php echo $item['user_email']; ?></td>
      <td><?php echo $item['username']; ?></td>
      <td><?php echo $item['status']; ?></td>
      <td><a style="font-size: 12px;" href="<?php echo ROOT_URL; ?>users/edit/<?php echo $item['user_id']; ?>">Edit</a><br><a style="font-size: 12px;" href="">Delete</a> <?php //echo $item['user_id']; ?></td>
    </tr>

<?php endforeach; ?>
  </tbody>
</table>

<p style="font-size: 12px;" class="text-right">STATUS 0 = off 1 = superadmin 2 = admin 3 = editor</p>

<a class="btn btn-primary" href="<?php echo ROOT_URL; ?>users/register" role="button">Add user</a>