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

	public function getId()
	{
		return $this->id;
	}

	public function getIdJ1()
	{
		return $this->idJ1;
	}

	public function getIdJ2()
	{
		return $this->idJ2;
	}

	public function getMatchList()
	{
		return $this->matchList;
	}

}
?>