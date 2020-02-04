<?php
class Responses extends Controller{
	protected function index(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'users/login');
		}
		$viewmodel = new responseModel();
		$this->returnView($viewmodel->index(), true);
	}
	protected function response(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'users/login');
		}
		$viewmodel = new responseModel();
		$this->returnView($viewmodel->getResponses(), true);
	}

	protected function add(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'users/login');
		}
		$viewmodel = new responseModel();
		$this->returnView($viewmodel->add(), true);
	}
	protected function answer(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'users/login');
		}
		$viewmodel = new responseModel();
		$this->returnView($viewmodel->answer(), true);
	}
}