<?php
class Images extends Controller{
	
	protected function Index(){
		$viewmodel = new ImagesModel();
		$this->returnView($viewmodel->Index(), true);
	}
}
?>
