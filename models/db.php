<?php

$pdo = new PDO("mysql:host=localhost:3306;dbname=biblio", "root", "");
try {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=biblio", "root", "");
} catch (Exception $ex) {
    echo "<div class='alert alert-danger'>Erreur de connexion à la base de données<br>" . $ex->getMessage() . "</div>";
    exit;
}

function selectAll(string $table): array|null {
   global $pdo;
   $requete = $pdo->query("SELECT * FROM $table");
   return $requete ? $requete->fetchAll(PDO::FETCH_ASSOC) : null;
}

function selectById(string $table, int $id):array|null {
    global $pdo;
    $requete = $pdo->query("SELECT * FROM $table WHERE id = $id");
    return $requete ? $requete->fetch(PDO::FETCH_ASSOC) : null;
}

function insertAuteur(array $donnees) {
    global $pdo;
    $requete = $pdo->prepare( "INSERT INTO auteur (nom, prenom, naissance, deces, biographie) VALUES (:nom, :prenom, :naissance, :deces, :biographie)");

    $requete->bindValue(":nom", $donnees["nom"]);
    $requete->bindValue(":prenom", $donnees["prenom"]);
    $requete->bindValue(":naissance", $donnees["naissance"]);
    $requete->bindValue(":deces", $donnees["deces"]);
    $requete->bindValue(":biographie", $donnees["biographie"]);

    $resultat = $requete->execute();
    if($resultat){
        return $requete->rowCount();
    }
    return false;
}

function updateAuteur(array $donnees, int $id) {
    global $pdo;
    $requete = $pdo->prepare( "UPDATE auteur SET nom = :nom, prenom = :prenom, naissance = :naissance, deces = :deces, biographie = :biographie WHERE id = :id");

    $requete->bindValue(":nom", $donnees["nom"]);
    $requete->bindValue(":prenom", $donnees["prenom"]);
    $requete->bindValue(":naissance", $donnees["naissance"]);
    $requete->bindValue(":deces", $donnees["deces"]);
    $requete->bindValue(":biographie", $donnees["biographie"]);
    $requete->bindValue(":id", $id);

    $resultat = $requete->execute();
    if($resultat){
        return $requete->rowCount();
    }
    return false;
}


function deleteAuteur(int $id) {
    global $pdo;
    return $pdo->exec("DELETE FROM auteur WHERE id = $id");
}

