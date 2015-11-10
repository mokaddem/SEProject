<?php
/**
* 
*/
class Utilisateur
{
	private $id, $nom, $prenom, $email, $adresse, $fixe, $mobile, $dateN, $creation;
	
	public function __construct($id, $nom, $prenom, $email, $adresse, $fixe, $mobile, $dateN, $creation)
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

	public function getId()
	{
		return $this->id;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getPrenom()
	{
		return $this->prenom;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getAdresse()
	{
		return $this->adresse;
	}

	public function getFixe()
	{
		return $this->fixe;
	}

	public function getMobile()
	{
		return $this->mobile;
	}

	public function getDateN()
	{
		return $this->dateN;
	}

	public function getCreation()
	{
		return $this->creation;
	}
}

?>