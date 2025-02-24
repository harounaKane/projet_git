<?php

class Banque{
    private $id;
    private $nom;
    private $ville;

    public function __construct( $id,  $nom,  $ville){
        $this->id = $id;
        $this->nom = $nom;
        $this->ville = $ville;
    }

    public function setId( $id): void {$this->id = $id;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setVille( $ville): void {$this->ville = $ville;}

    public function getId() {return $this->id;}

	public function getNom() {return $this->nom;}

	public function getVille() {return $this->ville;}

	
	
}