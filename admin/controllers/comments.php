<?php

class Comments extends Controller {
	
	protected function Index(){
		$viewmodel = new CommentsModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	
}