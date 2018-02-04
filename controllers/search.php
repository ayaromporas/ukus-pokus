<?php

class Search extends Controller {
	
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	protected function result(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->result(), true);
	}
}