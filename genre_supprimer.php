<?php
require "inc/init.inc.php";
$id = $_GET["id"] ?? null;
if(!$id){
    addMessage("danger", "URL invalide");
    redirection("genre_liste.php");
}

$requete = $pdo->query("SELECT * FROM genre WHERE id = $id");
$genre = $requete->fetch(PDO::FETCH_ASSOC);
if(!$genre){
    addMessage("danger", "Aucun genre trouvé avec cet identifiant");
    redirection("genre_liste.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    
        $requete = $pdo->exec("DELETE FROM genre WHERE id = $id");
        
        if( $requete ){
            addMessage("success", "le genre n°$id à été supprimer");
            redirection("genre_liste.php");
        }else{
        addMessage("danger", "la suppression du genre n°$id à été supprimé");
        redirection("genre_liste.php");
        }
    }


extract($genre); //pour crée les variables $libelle et $mots_cles
                  // à partie de $genre qui est un array associatif
//affichage
$title = "supprimer un genre";
include "views/header.html.php";
include "views/genre/form.html.php";
include "views/footer.html.php";