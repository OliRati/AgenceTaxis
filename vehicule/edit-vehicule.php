<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

$idVehicule = $_GET['id'] ?? null;

if (!is_numeric($idVehicule)) {
    dd("Ce vehicule n'existe pas !!!");
}

$car = getVehicule($pdo, $idVehicule);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {
        // traitement du formulaire d'ajout d'un vehicule

        $marque = nettoyer($_POST['marque']);
        $modele = nettoyer($_POST['modele']);
        $couleur = nettoyer($_POST['couleur']);
        $immatriculation = nettoyer($_POST['immatriculation']);

        updateVehicule($pdo, $idVehicule, $marque, $modele, $couleur, $immatriculation);
    }

    redirect("/vehicule/list-vehicule.php");
}

include PHP_ROOT . "/views/vehicule/vehicule-view.php";