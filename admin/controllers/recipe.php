<?php

class Recipe extends Controller {

	protected function Index(){
		$viewmodel = new RecipeModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

} 