<?php
class Home extends Controller{
	
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function Logout(){

		unset($_SESSION['logged']);
		unset($_SESSION['username']);
		unset($_SESSION['user_name']);
		unset($_SESSION['user_id']);
		unset($_SESSION['status']);
		session_destroy();

		//redirect
		header('Location:' . ROOT_URL );
	}
}
