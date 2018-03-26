<?php
class Users extends Controller{

	protected function Index(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function Insert(){
		$viewmodel = new UnitsModel();
		$this->ReturnView($viewmodel->Insert(), true);
	}

	protected function Register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->Register(), true);
	}

	protected function Login(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->Login(), true);
	}

	protected function Logout(){
		unset($_SESSION['logged']);
		unset($_SESSION['username']);
		unset($_SESSION['user_name']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
	}

	protected function Edit(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->Edit(), true);
	}
}
