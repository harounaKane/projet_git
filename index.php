
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <nav>
        <a href="?action=lire">Lire</a>
        <a href="?action=ajouter">Ajouter</a>
    </nav>
    
</body>
</html>

<?php

include_once('CompteManager.php');
include_once('classes/Compte.php');

$manager = new CompteManager();

//teste si $_GET action est defini
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
                $compte = new Compte(0, $_POST['solde']);
                
                // en paramètre le compte à ajouter dans à la bd
                $manager->ajouterCompte($compte);

                header("location: ?action=lire");
                exit;
            }

            include "vue/ajouter.php";
            break;
        
            case "delete":
                $manager->supprimerComptes($numero);
                header("location: ?action=lire");
                exit;

            case "update":

                // Test si le formulaier update est soumis
                if( isset($_POST['solde']) ){
                    $compte = new Compte($numero, $_POST['solde']);
                    
                    // en paramètre le compte à ajouter dans à la bd
                    $manager->updateComptes($compte);
   
                    header("location: ?action=lire");
                    exit;
                }

                $compte = $manager->lireUnCompte($numero);
                
                include "vue/ajouter.php";
                break;
            
    }
}

?>

