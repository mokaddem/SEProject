<?php
class Equipe
{
	private $id, $idJ1, $idJ2, $matchList;

	public function __construct($id, $idJ1, $idJ2, $matchList)
	{
		$this->id = $id;
		$this->idJ1 = $idJ1;
		$this->idJ2 = $idJ2;
		$this->matchList = $matchList;
	}
}
?>