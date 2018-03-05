<?php
class Recipes extends Controller{

	protected function Index(){
		$viewmodel = new RecipesModel();
		$this->returnView($viewmodel->Index(), true);
	}
	protected function Insert(){
		$viewmodel = new RecipesModel();
		$this->returnView($viewmodel->Insert(), true);
	}
	protected function View(){
		$viewmodel = new RecipesModel();
		$this->returnView($viewmodel->View(), true);
	}
	protected function Edit(){
		$viewmodel = new RecipesModel();
		$this->returnView($viewmodel->Edit(), true);
	}
	
}