
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container-fluid">

    <nav class="p-3">
        <a href="?action=lire" class="btn btn-success">Consulter les comptes</a>
        <a href="?action=ajouter" class="btn btn-success">Ajouter un compte</a>
        <a href="?actionBanque=lire" class="btn btn-success">Lister les banques</a>
        <a href="?actionBanque=ajouter" class="btn btn-success">Ajouter une banque</a>
    </nav>
    

<?php

include_once('CompteManager.php');
include_once("BanqueManager.php");

include_once('classes/Compte.php');
include_once('classes/Banque.php');

$manager = new CompteManager();
$managerBanque = new BanqueManager();

//teste si $_GET action est defini (POUR COMPTE)
if( isset($_GET['action']) ){
    extract($_GET);

    // selon 'action'
    switch($action){
        case "lire":
            // Récupère tous les comptes
            $comptes = $manager->lireComptes();
       
            include "vue/liste.php";
            break;
        case "ajouter":
            // Test si le formulaier ajouter est soumis
            if( isset($_POST['solde']) ){
                $compte = new Compte(0, $_POST['solde'], $_POST['banqueId']);
                
                // en paramètre le compte à ajouter dans à la bd
                $manager->ajouterCompte($compte);

                header("location: ?action=lire");
                exit;
            }

            $banques = $managerBanque->lire();
            include "vue/ajouter.php";
            break;
        
            case "delete":
                $manager->supprimerComptes($numero);
                header("location: ?action=lire");
                exit;

            case "update":

                // Test si le formulaier update est soumis
                if( isset($_POST['solde']) ){
                    $compte = new Compte($numero, $_POST['solde'], $_POST['banqueId']);
                    
                    // en paramètre le compte à modofier dans la bd
                    $manager->updateComptes($compte);
   
                    header("location: ?action=lire");
                    exit;
                }

                $compte = $manager->lireUnCompte($numero);
                
                include "vue/ajouter.php";
                break;
            
    }
}else if( isset($_GET['actionBanque']) ){ // ACTIONS POUR BANQUE
    extract($_GET);

    // selon 'action'
    switch($actionBanque){
        case "lire":
            $banques = $managerBanque->lire();
            include "vue/listeBanque.php";
            break;
        
        case "ajouter":

            if( isset($_POST['ville']) ){
                $banque = new Banque(0, $_POST['nom'], $_POST['ville']);

                $managerBanque->ajouter($banque);

                header("location: ?actionBanque=lire");
                exit;
            }

            include "vue/ajouterBanque.php";
            break;

        case "delete":
            $managerBanque->delete($numero);

            header("location: ?actionBanque=lire");
            exit;

        case "update":

            if( isset($_POST['ville']) ){
                $banque = new Banque($numero, $_POST['nom'],  $_POST['ville']);

                $managerBanque->update($banque);
                header("location: ?actionBanque=lire");
                exit;
            }

            $banque = $managerBanque->lireUneBanque($numero);
            include "vue/ajouterBanque.php";
            break;
    }
}

?>

