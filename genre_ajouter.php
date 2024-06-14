<?php
require "inc/init.inc.php";
if($_POST){
    extract($_POST);
    //validation du formulaire
    $erreurs = [];
    if(empty($libelle)){
        //si $libelle est vide ou n'existe pas
        $erreurs["libelle"] = "le champs libellé est obligatoire";
    }else{
        if(strlen($libelle) < 2 || strlen($libelle) > 50){
            $erreurs["libelle"] = "le libellé doit avoir une longueur comprise entre 2 et 50 caractéres";
        }
    }
    //
    if( empty($erreurs)){
        //INSERT INTO genre (libelle, mots_cles) VALUES ('','');
        $requete = $pdo->prepare("INSERT INTO genre (libelle, mots_cles) VALUES (:libelle, :mots_cles)");
        $requete->bindValue(":libelle", $libelle);
        $requete->bindValue(":mots_cles", $mots_cles);
        //gerer les messages
        if( $requete->execute() ){
            $_SESSION["message"][] = ["success", "le nouveau genre est enregistré"];
            header("Location: genre_liste.php");
            exit;
        }else{
            $_SESSION["message"][] = ["danger", "le nouveau genre n'a pas été enregistré"];
        }
    }
}


//affichage
$title = "Ajouter un genre";
include "views/header.html.php";
include "views/genre/form.html.php";
include "views/footer.html.php";