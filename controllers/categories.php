<?php

class Categories extends Controller {
	protected function Index(){
		$viewmodel = new CategoriesModel();
		$this->returnView($viewmodel->Index(), true);
	}
}