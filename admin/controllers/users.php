<?php
class Users extends Controller{
	protected function register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function Login(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->Login(), true);
	}
	protected function viev(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->viev(), true);
	}
	protected function Logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
	}
	protected function edit(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->edit(), true);
	}
}