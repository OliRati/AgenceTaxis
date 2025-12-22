<?php
require '../includes.php';

$idVehicule = $_GET['id'] ?? null;

if (!is_numeric($idVehicule)) {
    dd("Ce vehicule n'existe pas !!!");
}

$car = getVehicule($pdo, $idVehicule);
$marque = $car['marque'];
$modele = $car['modele'];
$couleur = $car['couleur'];
$immatriculation = $car['immatriculation'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    // traitement du formulaire de modification d'un vehicule

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Token CSRF invalide');
    }

    $marque = nettoyer($_POST['marque']);
    $modele = nettoyer($_POST['modele']);
    $couleur = nettoyer($_POST['couleur']);
    $immatriculation = nettoyer($_POST['immatriculation']);

    $state = updateVehicule($pdo, $idVehicule, $marque, $modele, $couleur, $immatriculation);
    if ($state) {
        redirect("/vehicule/list-vehicule.php");
    }
}

$pageTitle = "Modifier un vehicule";
include PHP_ROOT . "/views/vehicule/vehicule-view.php";
