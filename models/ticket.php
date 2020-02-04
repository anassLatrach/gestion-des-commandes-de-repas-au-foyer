<?php
class TicketModel extends Model{

	public function index(){
		header('Location: '.ROOT_URL.'ticket/index');
	}


	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			if($post['nomUser'] == '' || $post['prenomUser'] == '' || $post['password'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}

			// Insert into MySQL
			$this->query('INSERT INTO users (nomUser, prenomUser, email, pwd, ID_Type) VALUES(:nomUser, :prenomUser, :email, :password, 1)');
			$this->bind(':nomUser', $post['nomUser']);
			$this->bind(':prenomUser', $post['prenomUser']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'ticket/index');
			}
		}
		return;
	}
	
}