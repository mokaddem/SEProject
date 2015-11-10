<?php

class Categorie
{
    private $id, $designation, $annee;

    public function __construct($id, $designation, $annee)
    {
        $this->id = $id;
        $this->designation = $designation;
        $this->annee = $annee;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDesignation()
    {
        return $this->designation;
    }

    public function getAnnee()
    {
        return $this->annee;
    }


}