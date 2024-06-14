<?php
require "inc/init.inc.php";
$id = $_GET["id"] ?? null;
if(!$id){
    $_SESSION["messages"][] = ["danger", "URL Invalide"];
    header("location: genre_liste.php");
    exit;
}

$requete = $pdo->query("SELECT * FROM genre WHERE id = $id");
$genre = $requete->fetch(PDO::FETCH_ASSOC);
if(!$genre){
    $_SESSION["messages"][] = ["danger", "Aucun genre trouvé avec cet identifiant"];
    header("location: genre_liste.php");
    exit;
}

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
        $requete = $pdo->prepare("UPDATE genre SET libelle = :libelle, mots_cles = :mots_cles WHERE id = $id");
        $requete->bindValue(":libelle", $libelle);
        $requete->bindValue(":mots_cles", $mots_cles);
        //gerer les messages
        if( $requete->execute()){
            $_SESSION["messages"][] = ["success", "le genre à été modifié"];
            header("Location: genre_liste.php");
            exit;
        }else{
            $_SESSION["messages"][] = ["danger", "le genre n'a pas été modifié"];
        }
    }
}

extract($genre); //pour crée les variables $libelle et $mots_cles
                  // à partie de $genre qui est un array associatif
//affichage
$title = "modifier un genre";
include "views/header.html.php";
include "views/genre/form.html.php";
include "views/footer.html.php";