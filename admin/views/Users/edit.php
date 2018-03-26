<section class="box-typical ">
  <header class="box-typical-header">
    <div class="tbl-row"> 
      <div class="tbl-cell tbl-cell-title text-center">     
        <h3><i class="font-icon fas fa-chess-king"></i>&nbsp; &nbsp; &nbsp; Izmeni Administratora&nbsp; &nbsp; &nbsp; <i class="font-icon fas fa-chess-king"></i></h3>
      
      </div>  
 
    </div>
  </header>
<hr>
   
   
      <div class="panel-body" style="width: 350px; margin-left: 10px;">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control text-center" value="<?php  echo $viewmodel['user_name'];?>" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control text-center" value="<?php echo $viewmodel['user_email']; ?>"/>
          </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control text-center" value="<?php echo $viewmodel['username']; ?>"/>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="username" class="form-control text-center" value="<?php echo $viewmodel['user_phone']; ?>"/>
            </div>
             <label>Status</label><br>
            <div class="text-center">
           
              <input type="radio" name="status" value="1"> <button type="button" class="btn btn-rounded btn-success btn-sm"> Superadmin</button></td><br>
              <input type="radio" name="status" value="2"> <button type="button" class="btn btn-rounded btn-info btn-sm"> Admin</button><br>
              <input type="radio" name="status" value="3"> <button type="button" class="btn btn-rounded btn-primary btn-sm"> Editor</button> <br><br>
              
              </div>
              <input class="btn btn-primary" name="submit" type="submit" value="submit" />
        </form>
      </div>

</section><!--.box-typical-->
