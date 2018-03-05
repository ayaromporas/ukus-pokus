<?php

class Categories extends Controller {
	
	protected function Index(){
		$viewmodel = new CategoriesModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	protected function Insert(){
		$viewmodel = new CategoriesModel();
		$this->ReturnView($viewmodel->Insert(), true);
	}

	
}