<?php
class Admins extends Controller{
	protected function register(){
		$viewmodel = new AdminModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function Index(){
		$viewmodel = new AdminModel();
		$this->returnView($viewmodel->Index(), true);
	}
}