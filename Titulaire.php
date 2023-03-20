<?php

class Titulaire 
{
    private string $_nom;
    private string $_prenom;
    private string $_date;
    private string $_ville;
    private CompteBancaire $_compte;


//Constructeur pour définir le titulaire
    public function __construct(string $nom, string $prenom, string $date, string $ville)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_date = $date;
        $this->_ville = $ville;
    }

//Setter et Getter pour les propriétés du Titulaire
    public function getNom() : string
    {
        return $this->_nom;
    }
    public function setNom(string $nom)
    {
        $this->_nom = $nom;
    }

    public function getPrenom() : string
    {
        return $this->_prenom;
    }
    public function setPrenom(string $prenom)
    {
        $this->_prenom = $prenom;
    }

    public function getDate() : string
    {
        return $this->_date;
    }
    public function setDate(string $date)
    {
        $this->_date = $date;
    }

    public function getVille() : string
    {
        return $this->_ville;
    }
    public function setVille($ville)
    {
        $this->_ville = $ville;
    }

// Méthode pour obtenir le nom et prenom du titulaire
    public function __toString() {
        return $this->_prenom . " " . $this->_nom;
    }

}