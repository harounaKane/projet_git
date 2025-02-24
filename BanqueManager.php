<?php

class BanqueManager{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_projet_git", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function update(Banque $banque){
        $quer = "UPDATE banque SET nom = :nom, ville = :ville WHERE id = :id";

        $stmt = $this->pdo->prepare($quer);
        $stmt->execute([
            "nom"   => $banque->getNom(),
            "ville" => $banque->getVille(),
            "id"    => $banque->getId()
        ]);
    }

    public function lireUneBanque(int $id){
        $quer = "SELECT * FROM banque WHERE id = :id";
        $stmt = $this->pdo->prepare($quer);

        $stmt->execute(array("id" => $id));
        $res = $stmt->fetch();

        return new Banque($res['id'], $res['nom'], $res['ville']);
    }
    
    public function delete(int $id){
        $quer = "DELETE FROM banque WHERE id = :id";
        $stmt = $this->pdo->prepare($quer);

        $stmt->execute(["id" => $id]);
    }

    public function lire(){
        $stmt = $this->pdo->prepare("SELECT * FROM banque");

        $stmt->execute();

        $tab = [];

        while( $res = $stmt->fetch() ){
            $banque = new Banque($res['id'], $res['nom'], $res['ville']);

            $tab[] = $banque;
        }

        return $tab;
    }

    public function ajouter(Banque $banque){
        $query = "INSERT INTO banque (nom, ville) VALUES(:nom, :ville)";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute([
            "nom"   => $banque->getNom(),
            "ville" => $banque->getVille()
        ]);
    }
}