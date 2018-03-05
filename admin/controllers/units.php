<?php
class Units extends Controller{

	protected function Index(){
		$viewmodel = new UnitsModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function Insert(){
		$viewmodel = new UnitsModel();
		$this->ReturnView($viewmodel->Insert(), true);
	}
}
