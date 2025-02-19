<?php 


class Compte{
    private $numero;
    private $solde;
    private $dateCreation;

    public function __construct( $numero,  $solde,  $dateCreation){
        $this->numero = $numero;
        $this->solde = $solde;
        $this->dateCreation = $dateCreation;
    }	

    public function getNumero() {
        return $this->numero;
    }

	public function getSolde() {
        return $this->solde;
    }

	public function getDateCreation() {
        return $this->dateCreation;
    }

	public function setNumero( $numero): void {
        $this->numero = $numero;
    }

	public function setSolde( $solde): void {
        $this->solde = $solde;
    }

	public function setDateCreation( $dateCreation): void {
        $this->dateCreation = $dateCreation;
    }

	
}