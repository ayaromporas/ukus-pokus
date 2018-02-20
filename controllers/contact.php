<?php

class Contact extends Controller {
	
	protected function Index(){
		$viewmodel = new ContactModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	
}