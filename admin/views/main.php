<html>
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>

</head>
<body>

<div id="pop_up"> <!--PETAR div za popupove -->
	
</div>

<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">DASHBOARD version 1.0</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav nav-pills">
        <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <li class="nav-item">
          <a class="nav-link">Welcome <?php echo $_SESSION['user_data']['user_name']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Logout</a>
        </li>
       <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

<br>

  <?php if(isset($_SESSION['is_logged_in'])) : ?>

<div class="row justify-content-between">

  <div class="col-2"> <!-- start left nav -->
    <ul>
      <li>
        <a href="<?php echo ROOT_URL.'dashboard'?>">Dashboard</a>
      </li>
      <li>
        <a href="<?php echo ROOT_URL.'users/viev'?>">User</a>
      </li>
      <li>
        <a href="<?php echo ROOT_URL.'recipes/1'?>">Recepti</a>
      </li>
      <li>
        <a href="<?php echo ROOT_URL.'categories'?>">Kategorije</a>
      </li>
      <li>
        <a href="<?php echo ROOT_URL.'ingredients'?>">Sastojak</a>
      </li>
      <li>
        <a href="<?php echo ROOT_URL.'shares'?>">Komentar</a>
      </li>
      <li>
        <a href="<?php echo ROOT_URL.'setings'?>">Setings</a>
      </li>
    </ul>
  </div> <!-- end left nav -->

  <?php endif; ?>

  <div class="col-10">
    <?php Messages::display(); ?>
    <?php require($view); ?>
  </div>

</div>

</div><!-- /.container -->

	
	


	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
	
	 <script src="<?php echo ROOT_PATH; ?>assets/js/functions.js"></script>	<!--  PETAR  -->

</body>
</html>