<?php

include_once('CompteManager.php');
include_once('classes/Compte.php');

$manager = new CompteManager();

if( isset($_GET['action']) ){
    extract($_GET);

    switch($action){
        case "lire":
            $comptes = $manager->lireComptes();
       
            include "vue/liste.php";
            break;
        case "ajouter":

            if( isset($_POST['solde']) ){
                $compte = new Compte(0, $_POST['solde']);
                
                $manager->ajouterCompte($compte);

                header("location: ?action=lire");
                exit;
            }

            include "vue/ajouter.php";
            break;
    }
}

?>

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
