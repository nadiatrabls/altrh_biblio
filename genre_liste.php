<?php
//3306 est le por utiliser par defaut par mysql
$pdo = new PDO("mysql:host=localhost:3306;dbname=biblio", "root", "");
require "inc/init.inc.php";
//SELECT * FROM genre;
//il existe 3 types de requtes qu'on peut utiler:
// query pour les requetes select 
//exec pour les insert delete et update
//prepare et exec pour tous les genres de requetes select insert delete update
$requete = $pdo->query("SELECT * FROM genre");

// pour récuperer le resultat de la requete dans une variable
$genres = $requete->fetchAll(PDO::FETCH_ASSOC);

//si le fetch est vrai il retourne un array et s'il est false il ne retourne rien 
//AFFICHAGE
$title = "Liste des genres";
include "views/header.html.php";
// il faut verifier que genres n'est pas vide 
if($genres) {
  include "views/genre/table.html.php";
}else{
    echo "<div class='alert alert-danger'>Aucun genre n'a été trouvé</div>";
}
include "views/footer.html.php";