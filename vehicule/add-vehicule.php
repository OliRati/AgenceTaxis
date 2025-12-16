<?php
include '../fonctions.php';
require '../connexiondb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    // traitement du formulaire d'ajout d'un vehicule

    $marque = nettoyer($_POST['marque']);
    $modele = nettoyer($_POST['modele']);
    $couleur = nettoyer($_POST['couleur']);
    $immatriculation = nettoyer($_POST['immatriculation']);

    $sql = "INSERT INTO vehicule (marque,modele,couleur,immatriculation) VALUES (:marque, :modele, :couleur, :immatriculation)";
    $stm = $pdo->prepare($sql);
    $stm->execute([
        ':marque' => $marque,
        ':modele' => $modele,
        ':couleur' => $couleur,
        ':immatriculation' => $immatriculation
    ]);

    header("Location: " . WEB_ROOT . "/vehicule/list-vehicule.php");
}

include PATH_PROJECT . "/views/vehicule/add-vehicule-view.php";
