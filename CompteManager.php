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

    public function lireUnCompte(){
        echo "lire un";
    }

    public function supprimerComptes(){
        echo "supprimer";
    }

    public function updateComptes(){
        echo "update";
    }
}