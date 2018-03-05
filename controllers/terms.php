<?php

class Terms extends Controller {
	
	protected function Index(){
		$viewmodel = new TermsModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

}