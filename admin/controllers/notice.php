<?php

class Notice extends Controller {

	//komentari na cekanju se prikazuju na index strani
	protected function Index(){
		$viewmodel = new NoticeModel();
		$this->ReturnView($viewmodel->Index(), true);
	}
}
