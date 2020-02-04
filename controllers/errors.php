<?php
class Errors extends Controller{
	protected function Index(){
		$viewmodel = new ErrorModel();
		$this->returnView($viewmodel->Index(), true);
	}
}