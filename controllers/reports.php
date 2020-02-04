<?php
class Reports extends Controller{
	protected function index(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'users/login');
		}
		$id = $_SESSION['user_data']['id'];
		$viewmodel = new reportModel();
		$this->returnView($viewmodel->Index($id), true);
	}

	protected function add(){
		if(!isset($_SESSION['is_logged_in']) ){
			header('Location: '.ROOT_URL.'users/login');
		}
		$viewmodel = new reportModel();
		$this->returnView($viewmodel->add(), true);
	}

	protected function report(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'users/login');
		}
		$viewmodel = new reportModel();
		$this->returnView($viewmodel->getReportByID(), true);
	}
	protected function annuler(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'users/login');
		}
		if($_SESSION['user_data']['idType'] == 1){
			$viewmodel = new reportModel();
			$this->returnView($viewmodel->annuler(), true);
		}else{
			header('Location: '.ROOT_URL.'error');
		}
	}
}