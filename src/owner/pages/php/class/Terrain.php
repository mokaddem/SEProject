<?php


class Terrain
{
    private $id, $adresse, $surface, $idProprietaire, $etat, $dispo;

    public function __construct($id, $adresse, $surface, $idProprietaire, $etat, $dispo)
    {
        $this->id = $id;
        $this->adresse = $adresse;
        $this->surface = $surface;
        $this->idProprietaire = $idProprietaire;
        $this->etat = $etat;
        $this->dispo = $dispo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getSurface()
    {
        return $this->surface;
    }

    public function getIdProprietaire()
    {
        return $this->idProprietaire;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function getDispo()
    {
        return $this->dispo;
    }


}