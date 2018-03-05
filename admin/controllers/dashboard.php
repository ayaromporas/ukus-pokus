<?php
class Dashboard extends Controller{
	
	protected function Index(){
		$viewmodel = new DashboardModel();
		$this->returnView($viewmodel->Index(), true);
	}
}