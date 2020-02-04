<?php
    class Ticket extends Controller{
        protected function Index(){
            $viewmodel = new ticketModel();
            $this->returnView($viewmodel->index(), true);
        }
    
        protected function add(){
            if(!isset($_SESSION['is_logged_in'])){
                header('Location: '.ROOT_URL.'shares');
            }
            $viewmodel = new ticketModel();
            $this->returnView($viewmodel->add(), true);
        }
    }