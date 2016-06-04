<?php

class Administrateur extends Model {
	public $idA, $pseudo, $email, $mdpAdmin;

	public function toHTML()
	{
		return ($this->pseudo)." ".($this->email);
	}
  
	public static function getInscription() {
		$db = Database::getInstance();
		$sql = "SELECT * FROM inscription";
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Inscription");
		return $stmt->fetchAll();
	}
}
?>