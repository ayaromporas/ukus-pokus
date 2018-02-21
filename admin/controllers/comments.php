<?php

class Comments extends Controller {

	//komentari na cekanju se prikazuju na index strani
	protected function Index(){
		$viewmodel = new CommentsModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	protected function Banned(){
		$viewmodel = new CommentsModel();
		$this->ReturnView($viewmodel->Banned(), true);
	}

	protected function Approved(){
		$viewmodel = new CommentsModel();
		$this->ReturnView($viewmodel->Approved(), true);
	}


}
