<?php

class Contact extends Model {
	public $id, $nom, $prenom, $email;
	public static function setFromId( $id,$data ) {                                                                                                  
		$db = Database::getInstance();
		$sql = "UPDATE contacts set nom=:nom,prenom=:prenom,email=:email WHERE id = :id";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_CLASS, "Contact");
		return $stmt->execute(array(
			":id" => $id,
			":nom"=>$data['nom'],
			":prenom"=>$data['prenom'],
			":email"=>$data['email']));
		//return $stmt->fetch();
	}
	public function toHTML()
	{
		return ($this->prenom)." ".($this->nom);
	}
	public static function getFromId( $id ) {
		$db = Database::getInstance();
		$sql = "SELECT * FROM contacts WHERE id = :id";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Contact");
		$stmt->execute(array(":id" => $id));
		return $stmt->fetch();
	}

	public static function getList() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM contacts";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Contact");
		return $stmt->fetchAll();
	}
}
?>


