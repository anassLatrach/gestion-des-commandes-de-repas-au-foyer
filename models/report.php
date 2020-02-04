<?php
class ReportModel extends Model{
	
	public function Index($id){
		$this->query('SELECT * FROM messages ms, etats et, users us where ms.ID_etat = et.ID_etat 
		and ms.ID_user = us.ID_user 
		and ms.ID_user = '.$id.'   ORDER BY dateDebut DESC');

		$rows = $this->resultSet();
		
		return $rows;
	}

	public function getReportByID(){
		$this->query('SELECT *
		FROM reponses rep, messages msg, users us, users usr, etats et
		WHERE rep.ID_message = msg.ID_message 
		AND rep.ID_user = us.ID_user 
		AND msg.ID_user =  usr.ID_user
		AND msg.ID_etat = et.ID_etat
		AND msg.ID_message = :id');
		$this->bind(':id', $_GET['id']);
		$rows = $this->resultSet();
		return $rows;
	}

	public function annuler(){
		//add token
		$this->query('UPDATE messages SET ID_etat = 4 where ID_message = :id');
		//UPDATE messages SET ID_etat = :idEtat where ID_message = '
        $this->bind(':id', $_GET['id']);
        $this->execute();
		return;
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
}