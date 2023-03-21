<?php

class CompteBancaire 
{
    private string $_libelle;
    private float $_solde;
    private string $_devise;
    private Titulaire $_titulaire;


//Constructeur pour initaliser le compte bancaire
    public function __construct(string $libelle, float $solde, string $devise, Titulaire $titulaire)
    {
        $this->_libelle = $libelle;
        $this->_solde = $solde;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire;
        $this->_titulaire->addCompte($this);
    }

// Getter et setter pour les propriétés du compte bancaire
    public function getLibelle(): string
    {
        return $this->_libelle;
    }
    public function setLibelle(string $libelle)
    {
        $this->_libelle = $libelle;
    }

    public function getSolde(): float
    {
        return $this->_solde;
    }
    public function setSolde(string $solde)
    {
        $this->_solde = $solde;
    }
    
    public function getDevise(): string
    {
        return $this->_devise;
    }
    public function setDevise(string $devise)
    {
        $this->_devise = $devise;
    }

    public function getTitulaire(): Titulaire
    {
        return $this->_titulaire;
    }
    public function setTitulaire(Titulaire $titulaire)
    {
        $this->_titulaire = $titulaire;
    }

//Méthode pour crediter un compte bancaire
    public function crediter(float $nb): string
    {
        if ($nb <= 0)
        {
            return "<p>----------------------------------------</p>
                    Crédit impossible d'une somme inférieur ou égal à 0 " . $this->_devise . ".";
        }
        else 
        {
            $this->_solde += $nb;
            return "Le compte " . $this->_libelle . " de " . $this->_titulaire . " a été crédité de $nb ". $this->_devise . ". 
            <br> Le nouveau solde est de " . $this->_solde . " " . $this->_devise;
        }
    }

//Méthode pour debiter un compte bancaire
    public function debiter(float $nb): string
    {
        if ($nb <= 0)
        {
            return "<p>----------------------------------------</p>
                    Débit impossible d'une somme inférieur ou égal à 0 " . $this->_devise . ".";
        }
        elseif($this->_solde - $nb >= 0)
        {
            $this->_solde -= $nb;
             return "Le compte " . $this->_libelle . " de " . $this->_titulaire . " a été débité de $nb ". $this->_devise . ". 
            <br> Le nouveau solde est de " . $this->_solde . " " . $this->_devise ."<br>";
        }
        else
        {
            return "<p>----------------------------------------</p>
            Débit impossible car le compte ne peut pas être à découvert.";
        }
    }

//Méthode pour effectuer un virement d'un compte à l'autre
    public function virement(float $nb, object $compte): string
    {
        if ($nb <= 0 )
        {
            return "<p>----------------------------------------</p>
                    Virement impossible d'une somme inférieur ou égal à 0 " . $this->_devise . ".";
        }
        elseif ($this->_solde - $nb >= 0)
        {
            return "<p>----------------------------------------</p>"
                . $this->debiter($nb) .''. $compte->crediter($nb);
        }
        else
        {
            return "<p>----------------------------------------</p>
            Débit impossible car le compte ne peut pas être à découvert.";
        }
    }

//Méthode pour afficher quelques infos du compte (Libelle : solde devise)
    public function __toString()
    {
        return $this->_libelle." : ".$this->_solde . " " . $this->_devise ."<br>";
    }

//Méthode pour afficher toutes les info d'un compte bancaire
    public function infoCompte()
    {
        return "<p>----------------------------------------</p>
                <p> Le compte bancaire appartient à " . $this->_titulaire . "</p>
                    Plus d'info :
                    <br> Compte " . $this->_libelle . " : " . $this->_solde . " " . $this->_devise;
    }

}
?>