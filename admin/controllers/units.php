<?php
class Units extends Controller{

	protected function Index(){
		$viewmodel = new UnitsModel();
		$this->returnView($viewmodel->Index(), true);
	}
}
