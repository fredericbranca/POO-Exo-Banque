<?php

class Titulaire 
{
    private string $_nom;
    private string $_prenom;
    private string $_date;
    private DateTime $_birthday;
    private string $_ville;
    private array $_comptes;

///////////////////////////////Constructeur pour définir le titulaire/////////////////////////////////////////
    public function __construct(string $nom, string $prenom, string $date, string $ville)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_date = $date;
        $this->_birthday = new DateTime($date);
        $this->_ville = $ville;
        $this->_comptes = [];
    }

///////////////////////////////Setter et Getter pour les propriétés du Titulaire//////////////////////////
    public function getNom(): string
    {
        return $this->_nom;
    }
    public function setNom(string $nom)
    {
        $this->_nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->_prenom;
    }
    public function setPrenom(string $prenom)
    {
        $this->_prenom = $prenom;
    }

    public function getDate(): String
    {
        return $this->_date;
    }
    public function setDate(string $date)
    {
        $this->_date = $date;
    }

    public function getVille(): string
    {
        return $this->_ville;
    }
    public function setVille($ville)
    {
        $this->_ville = $ville;
    }

    public function getCompte(CompteBancaire $comptes)
    {
        return var_dump($this->_comptes);
    }
    public function setCompte(array $comptes)
    {
        $this->_comptes = $comptes;
    }
    
/////////////Methode pour ajouter un compte////////////////////
    public function addCompte(CompteBancaire $compte)
    {
        $this->_comptes[] = $compte;
    }
//////////////////////////Methode pour avoir l'âge du titulaire//////////////////////////////////////
    public function getAge(): string
    {
        return $this->_birthday->diff(new DateTime())->format("%y");
    }

///////////////////////////////Méthode toString pour obtenir le nom et prenom du titulaire//////////////////////////////////
    public function __toString() 
    {
        return $this->_prenom . " " . $this->_nom;
    }

 //////////////////////////Methode pour afficher les infomrations d'un titulaire/////////////////////////////
    public function infoTitulaire(): string
    {
        $result =  "<p>----------------------------------------</p>
                    <p> Information client : " . $this->_nom . " " . $this->_prenom . " " . $this->getAge() ." ans</p>
                    Comptes : <br>";
        foreach($this->_comptes as $compte)
        {
            $result .= $compte;
        }
        return $result;
    }

}