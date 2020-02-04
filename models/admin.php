<?php
class AdminModel extends Model{
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
			$this->query('INSERT INTO users (nomUser, prenomUser, email, pwd, ID_Type) VALUES(:nomUser, :prenomUser, :email, :password, 2)');
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


	public function index(){
		$this->query("SELECT * FROM users WHERE ID_type = 2 AND ");
		$rows = $this->resultSet();
		return $rows;
	}

	public function annuler(){
		$this->query('UPDATE users SET status = 0 where ID_user = :id');
		//UPDATE messages SET ID_etat = :idEtat where ID_message = '
        $this->bind(':id', $_GET['id']);
        $this->execute();
		return;
	}

}