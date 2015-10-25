<?php
/**
* 
*/
class Administrateur
{
	private $id, $nom;
	public function __construct($id, $nom)
	{
		$this->id = $id;
		$this->nom = $nom;
	}

	public function ajouterJoueur() {}
	public function modifierJoueur() {}
	public function supprimerJoueur() {}

	public function ajouterProprietaire() {}
	public function modiferProprietaire() {}
	public function supprimerProprietaire() {}
	
	public function ajouterTerrain() {}
	public function modifierTerrain() {}
	public function supprimerTerrain() {}
	
	public function creerCategorie() {}
	public function modifierCategorie() {}
	public function supprimerCategorie() {}
	
	public function creerEquipe() {}
	public function modifierEquipe() {}
	public function supprimerEquipe() {}

	public function creerMatch() {}
	public function modifierMatch() {}
	public function supprimerMatch() {}

	public function envoyerMailGroupe() {}


	public function getId()
	{
		return $this->id;
	}

	public function getNom()
	{
		return $this->nom;
	}


}
?>