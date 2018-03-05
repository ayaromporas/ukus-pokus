<?php 

class Messages {

	public static function setMsg($text, $type){
		if($type == 'error'){
			$_SESSION['errorMsg'] = $text;
		} elseif($type == 'success') {
			$_SESSION['successMsg'] = $text;
		}
	}

	public static function display(){

		if(isset($_SESSION['errorMsg'])){
			echo '<div class="page-center"><div class="container-fluid"><div class="text-center alert alert-danger" style="color:red; max-width: 400px; margin: 1rem auto;">' . $_SESSION['errorMsg'] . '</div></div></div>';
			unset($_SESSION['errorMsg']);
		}

			if(isset($_SESSION['successMsg'])){
			echo '<div class="page-center"><div class="container-fluid"><div class="text-center alert alert-success" style="color:green; max-width: 400px; margin: 1rem auto;">' . $_SESSION['successMsg'] . '</div></div></div>';
			unset($_SESSION['successMsg']);
		}
	}
}