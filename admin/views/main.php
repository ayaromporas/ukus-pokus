<?php 



if (isset($_SESSION['logged']) && ($_SESSION['logged'] === true) && isset($_SESSION['status'])){
        if ($_SESSION['status'] == 1) {

            $superadmin = true;
            $admin = false;
           $editor = false;

        }elseif ($_SESSION['status'] == 2) {

            $superadmin = false;
            $admin = true;
            $editor = false;

        }elseif ($_SESSION['status'] == 3) {
          
            $superadmin = false;
            $admin = false;
            $editor = true;

        }

        $username = $_SESSION['username'];
        $userName = $_SESSION['user_name'];
        
}else{
        $superadmin = false;
        $admin = false;
        $editor = false;
        $demo = true;
}

?>



<!DOCTYPE html>
<html>
<head lang="sr">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Ukus Pokus | Administracija</title>

  <link rel="icon" href="<?php echo ROOT_URL; ?>assets/img/favicon/favicon.ico">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

        <!-- odvojene funkcionalnosti i styling-->
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/separate/elements/ribbons.min.css">
   <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/separate/pages/ribbons.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/separate/pages/widgets.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/separate/elements/cards.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/lib/summernote/summernote.css"/>
<link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/separate/pages/editor.min.css">

      <!-- Font awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/lib/font-awesome/font-awesome.min.css">


    <!-- main styling -->
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/admin.css">



</head>

<body class="with-side-menu">

  <header class="site-header">
      <div class="container-fluid">

        <!-- LOGO -->
          <a href="<?php echo ROOT_URL; ?>" class="site-logo">
              <img class="hidden-md-down mr-3" src="<?php echo ROOT_URL; ?>assets/img/logoadmin.png" alt="logo admin">
              <img class="hidden-lg-down mr-2" src="<?php echo ROOT_URL; ?>assets/img/logomob.png" alt="logo admin">
          </a>



          <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
              <span>toggle menu</span>
          </button>
  
          <button class="hamburger hamburger--htla" id="hamburgerhead">
              <span>toggle menu</span>
          </button>
          <div class="site-header-content">
              <div class="site-header-content-in">
                  <div class="site-header-shown">


                      <div class="dropdown user-menu">
                          <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <!-- <img src="assets/img/avatar-2-64.png" alt=""> --><i class="font-icon glyphicon glyphicon-king"></i>
                          </button>
                     
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                              <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Zdravo, 
<?php 
if(($superadmin === true) || ($admin === true) || ($editor === true)) { 
  echo $userName;
}else{
  echo 'Demo';
}
 ?>
                              </a>
                              <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Moj profil</a>            
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?php echo ROOT_URL; ?>home/logout"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                          </div>
                      </div>


                  
  
                  </div><!--.site-header-shown-->
              </div><!--site-header-content-in-->
          </div><!--.site-header-content-->
      </div><!--.container-fluid-->
  </header><!--.site-header-->

<?php 

if(($superadmin === true) || ($admin === true) || ($editor === true)) { 

?>

<div class="mobile-menu-left-overlay"></div>
  <nav class="side-menu">
      <ul class="side-menu-list">
          <li class="indigo with-sub">
              <span>
                  <i class="font-icon fab fa-fort-awesome"></i>
                  <span class="lbl">Admin panel</span>
              </span>
              <ul>
                  <li><a href="<?php echo ROOT_URL; ?>dashboard"><span class="lbl">Opšti pregled</span><span class="label label-custom label-pill label-success">dashboard</span></a></li>
                  <li class="with-sub">
                      <span>
                          <span class="lbl">Performanse</span>
                      </span>
                      <ul>
                          <li><a href="https://uptimerobot.com/" target="blank"><span class="lbl">Uptime robot</span></a></li>
                          <li><a href="https://gtmetrix.com/" target="blank"><span class="lbl">GT metrix</span></a></li>
                      </ul>
                  </li>
                  <li class="with-sub">
                      <span>
                          <span class="lbl">Statistika</span>
                      </span>
                      <ul>
                          <li><a href="#"><span class="lbl">Google Analytics Home</span></a></li>
                          <li><a href="#"><span class="lbl">Real time visits</span></a></li>
                          <li><a href="#"><span class="lbl">Sadržaj sajta</span></a></li>
                      </ul>
                  </li>
                  <li><a href="#"><span class="lbl">Bezbednost</span></a></li>
                  <li class="with-sub">
                      <span>
                          <span class="lbl">Društvene mreže</span>
                      </span>
                      <ul>
                          <li><a href="#"><span class="lbl">Facebook</span></a></li>
                          <li><a href="#"><span class="lbl">Instagram</span></a></li>
                          <li><a href="#"><span class="lbl">Twitter</span></a></li>
                          <li><a href="#"><span class="lbl">LinkedIn</span></a></li>
                      </ul>
                  </li>
                  <li><a href="#"><span class="lbl">SEO</span></a></li>
                  <li><a href="#"><span class="lbl">Obaveze i finansije</span></a></li>
              </ul>

          </li>
          
          <li class="blue-sky with-sub">
                  <span>
                    <i class="font-icon fas fa-cogs"></i>
                    <span class="lbl">cPanel</span>
                 </span>
                <ul>
                  <li><a href="https://najboljidoktor.rs/cpanel" target="blank"><span class="lbl">cPanel</span></a></li>
                  <li><a href="https://najboljidoktor.rs:2083/cpsess3661855496/3rdparty/phpMyAdmin/index.php" target="blank"><span class="lbl">phpMyAdmin</span></a></li>
              </ul>
          </li>

          <li class="pink with-sub">
              <span>
                  <i class="font-icon fas fa-envelope"></i>
                  <span class="lbl">Poruke</span>
              </span>
              <ul>
                  <li><a href="https://mail.google.com/mail/u/0/" target="blank"><span class="lbl">Gmail inbox</span></a></li>
                  <li><a href="#"><span class="lbl">Facebook inbox</span></a></li>
              </ul>
          </li>

          <li class="aquamarine with-sub">
              <span>
                  <i class="font-icon fas fa-comments"></i>
                  <span class="lbl">Komentari</span>
              </span>
              <ul>
                  <li><a href="<?php echo ROOT_URL; ?>comments"><span class="lbl">Na čekanju</span><span class="label label-custom label-pill label-warning">10</span></a></li>
                  <li><a href="#"><span class="lbl">Odobreni</span><span class="label label-custom label-pill label-success">276</span></a></li>
                  <li><a href="#"><span class="lbl">Banovani</span><span class="label label-custom label-pill label-danger">13</span></a></li>
              </ul>
          </li>

          <li class="red with-sub">
              <span>
                  <i class="font-icon fas fa-utensils"></i>
                  <span class="lbl">Recepti</span>
              </span>
              <ul>
                  <li><a href="<?php echo ROOT_URL; ?>recipes"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">310</span></a></li>
                  <li><a href="<?php echo ROOT_URL; ?>recipes/insert"><span class="lbl">Dodaj novi recept</span></a></li>
              </ul>
          </li>

          <li class="gold with-sub">
                  <span>
                    <i class="font-icon fas fa-lemon"></i>
                    <span class="lbl">Namirnice</span>
                 </span>
                <ul>
                  <li><a href="<?php echo ROOT_URL; ?>ingredients"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">120</span></a></li>
                  <li><a href="#"><span class="lbl">Dodaj novu namirnicu</span></a></li>
  
               </ul>
          </li>

          <li class="green with-sub">
              <span>
                  <i class="font-icon glyphicon glyphicon-bookmark"></i>
                  <span class="lbl">Kategorije</span>
              </span>
              <ul>
                  <li><a href="<?php echo ROOT_URL; ?>categories"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">21</span></a></li>
                  <li><a href="<?php echo ROOT_URL; ?>categories/insert"><span class="lbl">Dodaj novu kategoriju</span></a></li>

              </ul>
          </li>

          <li class="purple with-sub">
                  <span>
                    <i class="font-icon fas fa-balance-scale"></i>
                    <span class="lbl">Jedinice mere</span>
                 </span>
                <ul>
                  <li><a href="<?php echo ROOT_URL; ?>units"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">53</span></a></li>
                  <li><a href="#"><span class="lbl">Dodaj novu jedinicu mere</span></a></li>

              </ul>
          </li>
          <li class="blue-sky with-sub">
                  <span>
                    <i class="font-icon glyphicon glyphicon-picture"></i>
                    <span class="lbl">Slike</span>
                 </span>
                <ul>
                  <li><a href="<?php echo ROOT_URL; ?>images"><span class="lbl">Pregled</span><span class="label label-custom label-pill label-success">921</span></a></li>
                  <li><a href="#"><span class="lbl">Dodaj novu sliku</span></a></li>
                  <li><a href="https://tinypng.com/" target="blank"><span class="lbl">Kompresuj slike</span></a></li>
              </ul>
          </li>

          <li class="grey-dark with-sub">
                  <span>
                    <i class="font-icon glyphicon glyphicon-king"></i>
                    <span class="lbl">Administratori</span>
                 </span>
                <ul>
                  <li><a href="<?php echo ROOT_URL; ?>users"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">6</span></a></li>
                  <li><a href="#"><span class="lbl">Dodaj admina</span></a></li>

              </ul>
          </li>

          <li class="green-light">
                  <a href="#"><span>
                    <i class="font-icon fas fa-bullhorn"></i>
                    <span class="lbl">Obaveštenje svim superadminima</span>
                 </span></a>

          </li>

          <li class="orange-red with-sub">
                  <span>
                    <i class="font-icon fas fa-life-ring"></i>
                    <span class="lbl">Dokumentacija</span>
                 </span>
                <ul>
                  <li><a href="#"><span class="lbl">Front End</span></a></li>
                  <li><a href="#"><span class="lbl">Back End</span></a></li>
                  <li><a href="https://github.com/ayaromporas/ukus-pokus" target="blank"><span class="lbl">Git</span></a></li>
                  <li><a href="https://getbootstrap.com/docs/4.0/getting-started/introduction/" target="blank"><span class="lbl">Bootstrap</span></a></li>
                  <li><a href="http://themesanytime.com/startui/demo/index.html" target="blank"><span class="lbl">Start UI</span></a></li>
                  
              </ul>
          </li>
        
          <li class="aquamarine with-sub">
              <span>
                  <i class="font-icon fas fa-address-book"></i>
                  <span class="lbl">Imenik</span>
              </span>
              <ul>
                  <li><a href="#"><span class="lbl">Saradnici</span></a></li>
                  <li><a href="#"><span class="lbl">Partneri</span></a></li>
              </ul>
          </li>

      </ul>
  
  </nav><!--.side-menu-->


  
<!-- Sadrzaj stranice -->
  <div class="page-content">
    <div class="container-fluid">
    
<?php require($view); ?>
<?php Messages::display(); ?>

    </div><!--.container-fluid-->
  </div><!--.page-content-->


<?php 

}else{ ?>


<div class="mobile-menu-left-overlay"></div>
  <nav class="side-menu">
      <ul class="side-menu-list">
          <li class="indigo with-sub">
              <span>
                  <i class="font-icon fab fa-fort-awesome"></i>
                  <span class="lbl">Admin panel</span>
              </span>
              <ul>
                  <li><a href="<?php echo ROOT_URL; ?>dashboard"><span class="lbl">Opšti pregled</span><span class="label label-custom label-pill label-success">dashboard</span></a></li>
                  <li class="with-sub">
                      <span>
                          <span class="lbl">Performanse</span>
                      </span>
                      <ul>
                          <li><a href="#"><span class="lbl">Uptime robot</span></a></li>
                          <li><a href="#"><span class="lbl">GT metrix</span></a></li>
                      </ul>
                  </li>
                  <li class="with-sub">
                      <span>
                          <span class="lbl">Statistika</span>
                      </span>
                      <ul>
                          <li><a href="#"><span class="lbl">Google Analytics Home</span></a></li>
                          <li><a href="#"><span class="lbl">Real time visits</span></a></li>
                          <li><a href="#"><span class="lbl">Sadržaj sajta</span></a></li>
                      </ul>
                  </li>
                  <li><a href="#"><span class="lbl">Bezbednost</span></a></li>
                  <li class="with-sub">
                      <span>
                          <span class="lbl">Društvene mreže</span>
                      </span>
                      <ul>
                          <li><a href="#"><span class="lbl">Facebook</span></a></li>
                          <li><a href="#"><span class="lbl">Instagram</span></a></li>
                          <li><a href="#"><span class="lbl">Twitter</span></a></li>
                          <li><a href="#"><span class="lbl">LinkedIn</span></a></li>
                      </ul>
                  </li>
                  <li><a href="#"><span class="lbl">SEO</span></a></li>
                  <li><a href="#"><span class="lbl">Obaveze</span></a></li>
              </ul>

          </li>
          
          <li class="blue-sky with-sub">
                  <span>
                    <i class="font-icon fas fa-cogs"></i>
                    <span class="lbl">cPanel</span>
                 </span>
                <ul>
                  <li><a href="#"><span class="lbl">cPanel</span></a></li>
                  <li><a href="#"><span class="lbl">phpMyAdmin</span></a></li>
              </ul>
          </li>

          <li class="pink with-sub">
              <span>
                  <i class="font-icon fas fa-envelope"></i>
                  <span class="lbl">Poruke</span>
              </span>
              <ul>
                  <li><a href="#"><span class="lbl">Gmail inbox</span></a></li>
                  <li><a href="#"><span class="lbl">Facebook inbox</span></a></li>
              </ul>
          </li>

          <li class="aquamarine with-sub">
              <span>
                  <i class="font-icon fas fa-comments"></i>
                  <span class="lbl">Komentari</span>
              </span>
              <ul>
                  <li><a href="<?php echo ROOT_URL; ?>comments"><span class="lbl">Na čekanju</span><span class="label label-custom label-pill label-warning">7</span></a></li>
                  <li><a href="#"><span class="lbl">Odobreni</span><span class="label label-custom label-pill label-success">276</span></a></li>
                  <li><a href="#"><span class="lbl">Banovani</span><span class="label label-custom label-pill label-danger">3</span></a></li>
              </ul>
          </li>

          <li class="red with-sub">
              <span>
                  <i class="font-icon fas fa-utensils"></i>
                  <span class="lbl">Recepti</span>
              </span>
              <ul>
                  <li><a href="<?php echo ROOT_URL; ?>recipes"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">1311</span></a></li>
                  <li><a href="<?php echo ROOT_URL; ?>recipes/insert"><span class="lbl">Dodaj novi recept</span></a></li>
                  <li><a href="#"><span class="lbl">Izmeni</span></a></li>
                  <li><a href="#"><span class="lbl">Obriši</span></a></li>
              </ul>
          </li>

          <li class="gold with-sub">
                  <span>
                    <i class="font-icon fas fa-lemon"></i>
                    <span class="lbl">Namirnice</span>
                 </span>
                <ul>
                  <li><a href="#"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">720</span></a></li>
                  <li><a href="#"><span class="lbl">Dodaj novu namirnicu</span></a></li>
                  <li><a href="#"><span class="lbl">Izmeni</span></a></li>
                  <li><a href="#"><span class="lbl">Obriši</span></a></li>
               </ul>
          </li>

          <li class="green with-sub">
              <span>
                  <i class="font-icon glyphicon glyphicon-bookmark"></i>
                  <span class="lbl">Kategorije</span>
              </span>
              <ul>
                  <li><a href="<?php echo ROOT_URL; ?>categories"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">21</span></a></li>
                  <li><a href="<?php echo ROOT_URL; ?>categories/insert"><span class="lbl">Dodaj novu kategoriju</span></a></li>
                  <li><a href="#"><span class="lbl">Izmeni</span></a></li>
                  <li><a href="#"><span class="lbl">Obriši</span></a></li>
              </ul>
          </li>

          <li class="purple with-sub">
                  <span>
                    <i class="font-icon fas fa-balance-scale"></i>
                    <span class="lbl">Jedinice mere</span>
                 </span>
                <ul>
                  <li><a href="#"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">73</span></a></li>
                  <li><a href="#"><span class="lbl">Dodaj novu jedinicu mere</span></a></li>
                  <li><a href="#"><span class="lbl">Izmeni</span></a></li>
                  <li><a href="#"><span class="lbl">Obriši</span></a></li>
              </ul>
          </li>
          <li class="blue-sky with-sub">
                  <span>
                    <i class="font-icon glyphicon glyphicon-picture"></i>
                    <span class="lbl">Slike</span>
                 </span>
                <ul>
                  <li><a href="#"><span class="lbl">Pregled</span><span class="label label-custom label-pill label-success">3921</span></a></li>
                  <li><a href="#"><span class="lbl">Dodaj novu sliku</span></a></li>
                  <li><a href="#"><span class="lbl">Izmeni</span></a></li>
                  <li><a href="#"><span class="lbl">Obriši</span></a></li>
                  <li><a href="#"><span class="lbl">Kompresuj slike</span></a></li>
              </ul>
          </li>

          <li class="grey-dark with-sub">
                  <span>
                    <i class="font-icon glyphicon glyphicon-king"></i>
                    <span class="lbl">Administratori</span>
                 </span>
                <ul>
                  <li><a href="#"><span class="lbl">Pretraga</span><span class="label label-custom label-pill label-success">12</span></a></li>
                  <li><a href="#"><span class="lbl">Dodaj novog admina</span></a></li>
                  <li><a href="#"><span class="lbl">Izmeni</span></a></li>
                  <li><a href="#"><span class="lbl">Obriši</span></a></li>
              </ul>
          </li>

          <li class="green-light">
                  <a href="#"><span>
                    <i class="font-icon fas fa-bullhorn"></i>
                    <span class="lbl">Obaveštenje svim superadminima</span>
                 </span></a>

          </li>

          <li class="orange-red with-sub">
                  <span>
                    <i class="font-icon fas fa-life-ring"></i>
                    <span class="lbl">Dokumentacija</span>
                 </span>
                <ul>
                  <li><a href="#"><span class="lbl">Front End</span></a></li>
                  <li><a href="#"><span class="lbl">Back End</span></a></li>
                  <li><a href="#"><span class="lbl">Git</span></a></li>
                  <li><a href="#"><span class="lbl">Bootstrap</span></a></li>
                  <li><a href="#"><span class="lbl">Start UI</span></a></li>
                  
              </ul>
          </li>
        
          <li class="aquamarine with-sub">
              <span>
                  <i class="font-icon fas fa-address-book"></i>
                  <span class="lbl">Imenik</span>
              </span>
              <ul>
                  <li><a href="#"><span class="lbl">Saradnici</span></a></li>
                  <li><a href="#"><span class="lbl">Partneri</span></a></li>
              </ul>
          </li>

      </ul>
  
  </nav><!--.side-menu-->


  <!-- Sadrzaj stranice -->
  <div class="page-content">
    <div class="container-fluid">
    
<?php require($view); ?>

<?php Messages::display(); ?>

    </div><!--.container-fluid-->
  </div><!--.page-content-->



  <?php 

}
   ?>


<!-- JS biblioteke -->
  <script src="<?php echo ROOT_URL; ?>assets/js/lib/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo ROOT_URL; ?>assets/js/lib/popper/popper.min.js"></script>
  <script src="<?php echo ROOT_URL; ?>assets/js/lib/tether/tether.min.js"></script>
  <script src="<?php echo ROOT_URL; ?>assets/js/lib/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo ROOT_URL; ?>assets/js/plugins.js"></script>
  <script src="<?php echo ROOT_URL; ?>assets/js/lib/summernote/summernote.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.summernote').summernote();
    });
  </script>


  <script src="<?php echo ROOT_URL; ?>assetsjs/lib/peity/jquery.peity.min.js"></script>
  <script src="<?php echo ROOT_URL; ?>assetsjs/lib/table-edit/jquery.tabledit.min.js"></script>
  <script src="<?php echo ROOT_URL; ?>assets/js/app.js"></script>




</body>
</html>