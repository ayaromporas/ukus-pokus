<?php
class Settings extends Controller{
	protected function Index(){
		$viewmodel = new SettingsModel();
		$this->returnView($viewmodel->Index(), true);
	}
}