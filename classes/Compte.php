<?php 


class Compte{
    private $numero;
    private $solde;
    private $dateCreation;
    private $banqueId;

    public function __construct( $numero,  $solde, $banqueId,  $dateCreation = new DateTime()){
        $this->numero = $numero;
        $this->solde = $solde;
        $this->banqueId = $banqueId;
        $this->dateCreation = $dateCreation;
    }	
    
    public function getNumero() {return $this->numero;}

	public function getSolde() {return $this->solde;}

	public function getDateCreation() {return $this->dateCreation;}

	public function getBanqueId() {return $this->banqueId;}

	
    public function setNumero( $numero): void {$this->numero = $numero;}

	public function setSolde( $solde): void {$this->solde = $solde;}

	public function setDateCreation( $dateCreation): void {$this->dateCreation = $dateCreation;}

	public function setBanqueId( $banqueId): void {$this->banqueId = $banqueId;}

	
	
}