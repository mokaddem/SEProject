<?php
/**
* 
*/
class Utilisateur
{
	private $id, $nom, $prenom, $email, $adresse, $fixe, $mobile, $dateN, $creation;
	
	public function __construct($id, $nom, $prenom, $email, $adresse, $fixe, $mobile, $date, $creation)
	{
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->email = $email;
		$this->adresse = $adresse;
		$this->fixe = $fixe;
		$this->mobile = $mobile;
		$this->dateN = $dateN;
		$this->creation = $creation;
	}
}

?>