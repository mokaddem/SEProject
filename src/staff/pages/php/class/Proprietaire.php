<?php

class Proprietaire
{
    private $terrains;

    public function __construct($terrains)
    {
        $this->terrains = $terrains;
    }

    public function ajouterTerrain() {}

    public function editerTerrain() {}

    public function supprimerTerrain() {}

    public function consulterTerrains() {}



    public function getTerrains()
    {
        return $this->terrains;
    }


}