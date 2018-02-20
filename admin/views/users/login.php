<?php 
/*
if($admin === true){
  header('Location: '.ROOT_URL.'dashboard');
}else{
  header('Location: '.ROOT_URL.'login');
}
*/
?>

   

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="">
                    <div class="sign-avatar">
                        <img src="<?php echo ROOT_URL; ?>assets/img/avatar-kolezeee.png" alt="">
                    </div>
                    <header class="sign-title">Prijavi se</header>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email ili korisničko ime"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Lozinka"/>
                    </div>
                    <div class="form-group">
                        <!-- <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Ostavi me prijavljenog</label>
                        </div> -->
                        <div class="float-right reset">
                            <a href="#">Resetuj lozinku</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded">Uloguj se</button>
                    <!-- <p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p> -->
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->