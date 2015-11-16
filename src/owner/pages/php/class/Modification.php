<?php

/**
 * Created by PhpStorm.
 * User: mitsuko
 * Date: 25/10/15
 * Time: 13:55
 */
class Modification
{
    private $id, $idAdmin, $idEntiteModif, $classeEntite, $action, $date;

    public function __construct($id, $idAdmin, $idEntiteModif, $classeEntite, $action, $date)
    {
        $this->id = $id;
        $this->idAdmin = $idAdmin;
        $this->idEntiteModif = $idEntiteModif;
        $this->classeEntite = $classeEntite;
        $this->action = $action;
        $this->date = $date;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    public function getIdEntiteModif()
    {
        return $this->idEntiteModif;
    }

    public function getClasseEntite()
    {
        return $this->classeEntite;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getDate()
    {
        return $this->date;
    }
}