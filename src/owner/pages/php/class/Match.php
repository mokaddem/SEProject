<?php
/**
 *
 */
class Match
{
    //si ca ne marche pas, declarer :
    // private
    // private
    // private
    // private
    private $id, $date, $idE1, $idE2, $score1, $score2, $idTerrain;

    public function __construct($id, $date, $idE1, $idE2, $score1, $score2, $idTerrain)
    {
        $this->id = $id;
		$this->date = $date;
		$this->idE1 = $idE1;
		$this->idE2 = $idE2;
		$this->score1 = $score1;
		$this->score2 = $score2;
		$this->idTerrain = $idTerrain;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @return mixed
	 */
	public function getIdE1()
	{
		return $this->idE1;
	}

	/**
	 * @return mixed
	 */
	public function getIdE2()
	{
		return $this->idE2;
	}

	/**
	 * @return mixed
	 */
	public function getScore1()
	{
		return $this->score1;
	}

	/**
	 * @return mixed
	 */
	public function getScore2()
	{
		return $this->score2;
	}

	/**
	 * @return mixed
	 */
	public function getIdTerrain()
	{
		return $this->idTerrain;
	}



}

?>