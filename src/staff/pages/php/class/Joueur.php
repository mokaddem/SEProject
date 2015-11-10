<?php
class Joueur
{
	private $classement, $participate;

	public function __construct($classement, $participate)
	{
		$this->classement = $classement;
		$this->participate = $participate;
	}

	public function consulterMatchs() {
		//TODO
	}

	public function getClassement()
	{
		return $this->classement;
	}

	public function getParticipate()
	{
		return $this->participate;
	}


}
?>