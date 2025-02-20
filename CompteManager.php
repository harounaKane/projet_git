<?php 

class CompteManager{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_projet_git", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }



    public function ajouterCompte(Compte $compte){
        $query = "INSERT INTO compte(solde) VALUES(:solde)";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["solde" => $compte->getSolde()]);

    }

    public function lireComptes(){

        $query = "SELECT * FROM compte";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $tab = [];

        while($res = $stmt->fetch()){
            $c = new Compte($res['numero'], $res['solde'], $res['dateCreation']);
            $tab[] = $c;
        }

        return $tab;
    }

    public function lireUnCompte($numero){
        $query = "SELECT * FROM compte WHERE numero = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["id" => $numero]);

        $res = $stmt->fetch();
        $compte = new Compte($res['numero'], $res['solde'], $res['dateCreation']);
      

        return $compte;
    }

    public function supprimerComptes($numero){
        
        $stmt = $this->pdo->prepare("DELETE FROM compte WHERE numero = :id");
        $stmt->execute(["id" => $numero]);
    }

    public function updateComptes($compte){
        $query = "UPDATE compte SET solde = :solde WHERE numero = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute([
            "solde" => $compte->getSolde(),
            "id"    => $compte->getNumero()
        ]);
    }
}