<?php 
$users = $viewmodel;  //spisak svih korisnika

?>

<div class="row">
                <div class="col-xl-3">
                    <div class="ribbon-block round relative">
                        <div class="ribbon green left-top">
                            <i class="icon-font white fas fa-star"></i>
                            <span class="white">Superadmin</span>
                        </div>
		<br>
                        <ul class="chart-legend-list font-14">
                        	<li><div class="dot green"></div>Upravljanje svim sadržajima</li>
                        	<li><div class="dot green"></div>Dodavanje, izmene i brisanje drugih superadmina, admina i editora</li>
                        	<li><div class="dot green"></div>Pristup svim opcijama admin panela</li>
                        	<li><div class="dot green"></div>Pristup svim spoljnim servisima</li>
                        	<li><div class="dot green"></div>Pristup svim fajlovima i bazi na serveru</li>
                        </ul>

                    </div>
                </div><!--.col-->
                <div class="col-xl-3">
                    <div class="ribbon-block round relative">
                        <div class="ribbon bgr-purple left-top">
                            <i class="icon-font white fas fa-star"></i>
                            <span class="white">Admin</span>
                        </div>
                        <br>
                        <ul class="chart-legend-list font-14">
                        	<li><div class="dot purple"></div>Upravljanje receptima, sastojcima, jedinicama, slikama, komentarima</li>
                        	<li><div class="dot purple"></div>Pristup svoj dokumentaciji</li>
                        	<li><div class="dot purple"></div>Pristup nekim spoljnim servisima</li>
                        	<li><div class="dot purple"></div>Mogućnost poruke superadminima</li>
                       </ul>
                    </div>
                </div><!--.col-->
                <div class="col-xl-3">
                    <div class="ribbon-block round relative">
                        <div class="ribbon info left-top">
                            <i class="icon-font white fas fa-star"></i>
                            <span class="white">Editor</span>
                        </div>
                        <br>
                        <ul class="chart-legend-list font-14">
                        	<li><div class="dot blue"></div>Upravljanje receptima koje je sam kreirao</li>
                        	<li><div class="dot blue"></div>Odobravanje i brisanje komentara posetilaca</li>
                        	<li><div class="dot blue"></div>Mogućnost poruke superadminima</li>
                       </ul>

                    </div>
                </div><!--.col-->
                <div class="col-xl-3">
                    <div class="ribbon-block round relative">
                        <div class="ribbon yellow left-top">
                            <i class="icon-font white fas fa-star"></i>
                            <span class="white">Demo</span>
                        </div>
                        <br>
                        <ul class="chart-legend-list font-14">
                        	<li><div class="dot orange"></div>Prikaz svih funkcionalnosti u disabled varijanti ili u active varijanti ali bez kontakta sa bazom</li>                        	
                       </ul>

                    </div>
                </div><!--.col-->
</div>




<section class="box-typical">
	<header class="box-typical-header">
		<div class="tbl-row">
			<div class="tbl-cell tbl-cell-action-bordered">
				<a href="<?php echo ROOT_URL; ?>users/insert"><i class="green fas fa-plus-square fa-2x"></i></a>
			</div>	
			<div class="tbl-cell tbl-cell-title text-center">			
				<h3><i class="font-icon fas fa-chess-king"></i>&nbsp; &nbsp; &nbsp; Administratori&nbsp; &nbsp; &nbsp; <i class="font-icon fas fa-chess-king"></i></h3>
			
			</div>	
			<div class="tbl-cell tbl-cell-action-bordered">
				<select>
					<option>10</option>
					<option>25</option>
					<option>50</option>
				</select>
			</div>	
		</div>
	</header>
	<div class="box-typical-body">
		<div class="table-responsive" id="#adminlist">
			<table class="table table-hover" >
				<thead>
					<tr>
						<th class="text-center">Ime</th>
						<th class="text-center">Korisničko ime</th>
						<th class="text-center"><i class="font-icon fas fa-at"></i></th>
						<th class="text-center"><i class="font-icon fas fa-phone"></i></th>
						<th class="text-center">Status</th>
						<th class="text-center">Izmeni</th>
						<th class="text-center">Obriši</th>
					</tr>
				</thead>
				<tbody>

<?php 

foreach ($viewmodel as $user) {
	if ($user['status'] != 0) {
		
	

		$name = $user['user_name'];
		$nick = $user['username'];
		$email = $user['user_email'];
		$cellphone = $user['user_phone'];
		if($user['status'] == 1){
			$status = "superadmin";
			$color = "btn-success";
		}elseif ($user['status'] == 2) {
			$status = "admin";
			$color = "btn-info";
		}elseif ($user['status'] == 3) {
			$status = "editor";
			$color = "btn-primary";
		}

?>
					<tr>
						<td class="text-center"><?php echo $name; ?></td>
						<td class="text-center"><?php echo $nick; ?></td>
						<td class="text-center"><?php echo $email; ?></td>
						<td class="text-center"><?php echo $cellphone; ?></td>
						<td class="text-center"><button type="button" class="btn btn-rounded <?php echo $color; ?> btn-sm"><?php echo $status; ?></button></td>
						<td class="table-icon-cell text-center" ><a href="<?php echo ROOT_URL; ?>users/edit/<?php echo $user['user_id']; ?>"><i class="font-icon fas fa-edit"></i></a></td>
						<td class="table-icon-cell text-center"><i class="font-icon fas fa-trash"></i></td>
						
					</tr>

<?php	
	}
}
 ?>					
			
				
				</tbody>
			</table>
		</div>
	</div><!--.box-typical-body-->
</section><!--.box-typical-->

<!-- paginacija -->
<nav aria-label="Page navigation example" class="text-center">
  <ul class="pagination">
    
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">...</a></li>
    <li class="page-item"><a class="page-link" href="#">12</a></li>
    <li class="page-item active"><a class="page-link" href="#">13</a></li>
    <li class="page-item"><a class="page-link" href="#">14</a></li>
    <li class="page-item"><a class="page-link" href="#">...</a></li>
    <li class="page-item"><a class="page-link" href="#">37</a></li>

  </ul>
</nav>

