<?php

class Categories extends Controller {
	
	protected function Index(){
		$viewmodel = new CategoriesModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	
}