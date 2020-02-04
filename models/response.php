<?php
class ResponseModel extends Model{
	/*public function Index(){
		$this->query('SELECT * FROM respones ms, etats et where ms.ID_etat = et.ID_etat ORDER BY dateDebut DESC');

		$rows = $this->resultSet();
		return $rows;
	}**/
	public function Index(){

		 /*$this->query("select *
		 from reponses rep, messages msg, users us, users usr, etats et
		 WHERE rep.ID_message = msg.ID_message 
		 AND rep.ID_user = us.ID_user 
		 AND msg.ID_user =  usr.ID_user
		 AND msg.ID_etat = et.ID_etat");*/
		 $this->query("select *
		 from messages msg, users usr, etats et
		 WHERE 
		  msg.ID_user =  usr.ID_user
		 AND msg.ID_etat = et.ID_etat");
		 $rows = $this->resultSet();
		return $rows;
	}

	public function getResponses(){
		$this->query("SELECT *
		FROM reponses rep, messages msg, users us, users usr, etats et
		WHERE rep.ID_message = msg.ID_message 
		AND rep.ID_user = us.ID_user 
		AND msg.ID_user =  usr.ID_user
		AND msg.ID_etat = et.ID_etat");
		$rows = $this->resultSet();
	   return $rows;
	}

	public function getResponseID($id){
		$this->query("select rep.ID_reponse,msg.objet, msg.message  ,rep.reponses, rep.date, 
		us.nomUser as nomAdmin  ,usr.prenomUser as prenomClient, et.etat
		from reponses rep, messages msg, users us, users usr, etats et
		WHERE rep.ID_message = msg.ID_message 
		AND rep.ID_user = us.ID_user 
		AND msg.ID_user =  usr.ID_user
		AND msg.ID_etat = et.ID_etat
		AND rep.ID_reponse".$id);
		$rows = $this->resultSet();
	   return $rows;
	}


	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			if($post['objet'] == '' || $post['message'] == '' || $post['idUser'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO messages (objet, message, ID_user, dateDebut,ID_etat) VALUES(:objet, :message, :ID_user, NOW() ,:ID_etat)');
			$this->bind(':objet', $post['objet']);
			$this->bind(':message', $post['message']);
			$this->bind(':ID_user', $post['idUser']);
			$this->bind(':ID_etat', 1);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'reports');
			}
		}
		return;
	}

	public function updateMessageEtat($id){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if($post['submit']){
			if($post['etat'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
		$query = $this->query('UPDATE messages SET ID_etat = :idEtat where ID_message = '.$id);
				$this->bind(':idEtat',  $post['etat']);
				$this->execute();

	}
}
	public function answer(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			if($post['reponse'] == '' || $post['idUser'] == '' || $post['idMessage'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO reponses  (reponses, ID_message, ID_user, date) VALUES(:reponses, :idMessage, :ID_user, NOW())');
			$this->bind(':reponses', $post['reponse']);
			$this->bind(':idMessage', $post['idMessage']);
			$this->bind(':ID_user', $post['idUser']);
			$this->execute();
			$this->updateMessageEtat($post['idMessage']);
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'reports');
			}
		}
		return;
	}

	



}