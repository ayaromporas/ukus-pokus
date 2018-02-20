<?php
class Ingredients extends Controller{
	
	protected function Index(){
		$viewmodel = new IngredientsModel();
		$this->returnView($viewmodel->Index(), true);
	}
}
?>
