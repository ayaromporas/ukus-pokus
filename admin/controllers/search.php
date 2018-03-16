<?php

class Search extends Controller {
	
	protected function Index(){
		$viewmodel = new SearchModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

}