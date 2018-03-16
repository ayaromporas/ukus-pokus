<?php

class Category extends Controller {
	
	protected function Index(){
		$viewmodel = new CategoryModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	
}


