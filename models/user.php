<?php
class UserModel extends Model{
	public function register(){
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
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			// Compare Login
			$this->query('SELECT * FROM users  WHERE email = :email AND pwd = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['ID_user'],
					"nom"	=> $row['nomUser'],
					"idType"	=> $row['ID_type'],
					"email"	=> $row['email']
				);
				header('Location: '.ROOT_URL.'home');
			} else {
				Messages::setMsg('Incorrect Login', 'error');
			}
		}
		return;
	}
}