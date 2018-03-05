<?php 

if (($superadmin || $admin || $editor) === true) {

?>
<div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid"><br>
                <form class="sign-box text-center" >
                    <div class="sign-avatar">
                        <img src="<?php echo ROOT_URL; ?>assets/img/avatar-kolezeee.png" alt="">
                    </div>
                    <header class="sign-title">Zdravo, <?php echo $_SESSION['user_name'] ?></header>
                    
                    <div class="form-group text-center">
                        Status: 
                        <?php 
                        if($superadmin === true){
                            echo "Superadmin";
                        }elseif ($admin === true) {
                            echo "Admin";
                        }elseif ($editor === true) {
                            echo "Editor";
                        } ?>
                    </div>
                    <div class="form-group">
                        <!-- <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Ostavi me prijavljenog</label>
                        </div> -->
                        
                    </div>
             
                    <a href="<?php echo ROOT_URL; ?>dashboard" class="btn btn-success btn-rounded" id="logged">Dashboard</a>
                    <!-- <p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p> -->
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form><br><br>

            </div>
        </div>
    </div><!--.page-center-->












<?php
}elseif ($demo === true) {
    
 ?>


<div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="<?php echo ROOT_URL; ?>" method="POST">
                    <div class="sign-avatar">
                        <img src="<?php echo ROOT_URL; ?>assets/img/avatar-kolezeee.png" alt="">
                    </div>
                    <header class="sign-title">Prijavi se</header>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email ili korisničko ime" name="username" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Lozinka" name="password" >
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
                    <button type="submit" class="btn btn-success btn-rounded" name="submit" value="submit" id="submit">Uloguj se</button>
                    <!-- <p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p> -->
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>

            </div>
        </div>
    </div><!--.page-center-->


<?php 
}
 ?>





