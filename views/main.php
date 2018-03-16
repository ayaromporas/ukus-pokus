 <!doctype html>
<html lang="sr">
<head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-86840721-6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-86840721-6');
    </script>
    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ukus pokus | Brzi recepti od onoga što imate u kući">
    <meta name="author" content="Kolezeee Solutions">
    <link rel="icon" href="<?php echo ROOT_URL; ?>assets/img/favicon/favicon.ico">

    <title>Ukus pokus | Brzi recepti od onoga što imate u kući</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ROOT_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
 
      <!-- Form search -->
      <script src="<?php echo ROOT_URL; ?>assets/js/jquery-2.1.3.min.js"></script>
      <script src="<?php echo ROOT_URL; ?>assets/js/select2.full.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/select2-bootstrap4.min.css">

    <!-- Font awesome -->
    <script defer src="<?php echo ROOT_URL; ?>assets/js/all.js"></script>

        <!-- Custom styles for this template -->
    <link href="<?php echo ROOT_URL; ?>assets/css/starter-template.css" rel="stylesheet">
</head>

<body>



<!-- Braon trakica na vrhu -->
<div class="beige d-flex  justify-content-end">
      <a href="#"><img src="<?php echo ROOT_URL; ?>assets/img/soc/fb.png" class="soc"></a>
      <a href="#"><img src="<?php echo ROOT_URL; ?>assets/img/soc/inst.png" class="soc"></a>
      <a href="#"><img src="<?php echo ROOT_URL; ?>assets/img/soc/twitter.png" class="soc"></a>
 </div><!-- Kraj braon trakice -->

<!-- Navigacija -->   
<nav class="navbar navbar-expand-md">
      <!-- Logo -->
      <a class="navbar-brand" href="<?php echo ROOT_URL; ?>"><img src="<?php echo ROOT_URL; ?>assets/img/logozasajt1.png" alt='logo' class="main-logo"></a><!-- kraj logo -->
      <!-- Dugme hamburger -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsUkusPokus" aria-controls="navbarsUkusPokus" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img src="<?php echo ROOT_URL; ?>assets/img/menu.png" alt='menu' class="menu"></span>
      </button><!-- kraj dugme -->
      <!-- Menu items -->
      <div class="collapse navbar-collapse" id="navbarsUkusPokus">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link animated" href="<?php echo ROOT_URL; ?>">Početna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link animated" href="<?php echo ROOT_URL; ?>categories">Kategorije</a>
          </li>
          <li class="nav-item">
            <a class="nav-link animated" href="<?php echo ROOT_URL; ?>search">Loodilo pretraga</a>
          </li>
        </ul>
      </div><!-- Kraj menu items -->
</nav><!-- Kraj navigacija -->


<!-- Main  -->
<?php require($view); ?>



<!-- Footer -->
<footer id="footer-main">
  <nav >
          <ul class="nav justify-content-center">
                 <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>"> © 2018 Ukus Pokus. Sva prava zadržana. </a></li>
                 <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>contact">Kontakt</a></li>
                 <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>terms">Pravila</a></li>
                 <li class="nav-item"><a class="nav-link" href="https://www.kolezeeesolutions.com/" target="_blank"> Kreirao i održava Kolezeee Solutions</a> </li>
          </ul>
  </nav>
</footer><!-- End footer -->




    <!-- Bootstrap core JavaScript (jQuery, Popper and Bootstrap)
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo ROOT_URL; ?>assets/js/jquery-slim.min.js"><\/script>')</script>
    <script src="<?php echo ROOT_URL; ?>assets/js/popper.min.js"></script>
    <script src="<?php echo ROOT_URL; ?>assets/js/bootstrap.min.js"></script>
    
      <!-- Form search -->
      <script src="<?php echo ROOT_URL; ?>assets/js/jquery-2.1.3.min.js"></script>
      <script src="<?php echo ROOT_URL; ?>assets/js/select2.full.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</body>
</html>
