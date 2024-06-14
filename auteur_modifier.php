<?php 

require "inc/init.inc.php";

$id = $_GET["id"] ?? null;
$auteur = selectById("auteur", $id);

if( $_POST ) {
    // VALIDATION DU FORMULAIRE
    // TODO 
    if( empty($erreurs) ){
        if( updateAuteur($_POST, $id) ) {
            addMessage("success", "Auteur n°$id modifié");
            redirection("auteur_liste.php");
        } else {
            addMessage("danger", "Erreur lors de l'insertion");
        }
    }
}

$title = "Modifier un auteur";
extract($auteur); // déclare les variables qui vont remplir le formulaire

include "views/header.html.php";
include "views/auteur/form.html.php";
include "views/footer.html.php";