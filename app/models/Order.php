<?php

namespace App\models;

class Order
{
    private $id_order;
    private $reference;
    private $id_account;
    private $id_travel;
    private $nb_personne;
    private $nb_week;
    private $total;

    public function getId()
    {
        return $this->id_order;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function getIdAccount()
    {
        return $this->id_account;
    }

    public function getIdTravel()
    {
        return $this->id_travel;
    }

    public function getNbPersonne()
    {
        return $this->nb_personne;
    }

    public function getNbWeek()
    {
        return $this->nb_week;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setIdAccount($id_account)
    {
        $this->id_account = $id_account;
    }

    public function setIdTravel($id_travel)
    {
        $this->id_travel = $id_travel;
    }

    public function setNbPersonne($nb_personne)
    {
        $this->nb_personne = $nb_personne;
    }

    public function setNbWeek($nb_week)
    {
        $this->nb_week = $nb_week;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
}