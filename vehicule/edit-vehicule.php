<?php
require '../.env.php';
include '../fonctions.php';
require '../connexiondb.php';

$idVehicule = $_GET['id'] ?? null;

if (!is_numeric($idVehicule)) {
    dd("Ce vehicule n'existe pas !!!");
}

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

$car = getVehicule($pdo, $idVehicule);
$marque = $car['marque'];
$modele = $car['modele'];
$couleur = $car['couleur'];
$immatriculation = $car['immatriculation'];

include PHP_ROOT . "/views/vehicule/vehicule-view.php";