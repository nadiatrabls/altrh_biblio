<?php

require "inc/init.inc.php";



if($_POST) {
    //VALIDATION DU FORMULAIRE
    if( empty($erreurs)){
        if(insertAuteur($_POST)){
            addMessage("success", "Nouvel auteur enregistré");
            redirection("auteur_liste.php");
        } else{
            addMessage("danger","Erreur lors de l'insertion");
        }
    }
}
$title = 'Ajouter un auteur';
//extract($auteur); //déclare les variables qui vont remplir le formulaire 

include "views/header.html.php";
include "views/auteur/form.html.php";
include "views/footer.html.php";